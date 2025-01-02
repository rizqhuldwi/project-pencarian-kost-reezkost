# Base image: PHP 8.2 with FPM
FROM php:8.2-fpm

# Install system dependencies, including oniguruma for mbstring support
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libonig-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
       pdo \
       pdo_mysql \
    mysqli \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    opcache \
    && docker-php-ext-install mysqli \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js version 20 and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Set Working Directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install npm dependencies
RUN npm install

# Prepare Laravel directories and storage symlink
RUN chown -R www-data:www-data /var/www/html

# Remove default Nginx configuration and add custom config
RUN rm /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default \
    && mv /var/www/html/docker/nginx/default.conf /etc/nginx/sites-available/default \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

# Expose port 80
EXPOSE 80

# Command to run both PHP-FPM and Nginx
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]