<?php
session_start();
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kost | Kost Nasocha</title>
  <link rel="stylesheet" href="detail.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="shortcut icon" href="img/kost.png" type="img/x-icon">
</head>

<body>
  <div class="container">
    <!-- Main Content -->
    <div class="main-content">
      <!-- Image Gallery -->
      <div class="image-gallery">
        <img class="main-image" src="img/kost1.jpg" alt="Main Kost Image">
      </div>

      <!-- Kost Information -->
      <div class="kost-info">
        <h1>Kost Nasocha </h1>
        <p>Kost Nasocha adalah kost putra umum yang berlokasi di Jl. Sinom No. 104e Karangjati, Mlati, Sleman, Yogyakarta. Kost ini
          menyediakan fasilitas umum yang lengkap dan spesifikasi kamar yang nyaman. Kost ini hanya bisa melakukan
          penyewaan dalam waktu 6 Bulan.</p>
        <hr>
        <div class="facilities">
          <h3>Fasilitas Umum</h3>
          <p> • Dapur</p>
          <p> • Listrik</p>
          <p> • Parkir Motor</p>
          <p> • K. Mandi Luar</p>
          <p> • Tempat Jemuran</p>
        </div>
        <hr>
        <div class="facilities">
          <h3>Spesifikasi Kamar</h3>
          <p> • 3 x 3 meter</p>
          <p> • Kasur</p>
          <p> • Meja Belajar</p>
          <p> • Catatan : Untuk nomor kamar 1-5 berada di lantai bawah dan nomor kamar 6-10 berada di lantai dua</p>
          <hr>
        </div>
        <div class="facilities">
          <h3>Gallery</h3>
          <img class="box-image" src="img/kost2.jpg" alt="Kost Nasocha" width="400">
          <img class="box-image" src="img/kost3.jpg" alt="Kost Nasocha" width="400">
          <hr>
        </div>
        <div class="facilities">
          <h3>Lokasi</h3>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7906.461439716404!2d110.366887!3d-7.765340000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a584ffeedc4d9%3A0x85a9d7bbacaa8b2a!2sGg.%20Mijil%203%2C%20Kutu%20Dukuh%2C%20Sinduadi%2C%20Kec.%20Mlati%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2055284!5e0!3m2!1sid!2sid!4v1733126159941!5m2!1sid!2sid"
            width="400" height="300" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
          <hr>
          <a href="index.php">&laquo Kembali</a>
        </div>
      </div>      
    </div>


    <!-- Sidebar -->
    <div class="sidebar">
      <h2>Formulir Penyewaan Kamar</h2>
      <form action="" method="post">
        <div class="form-group">
          <label for="nama">Nama Lengkap:</label>
          <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <input type="text" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
          <label for="telephone">Nomor Telepon:</label>
          <input type="tel" id="telephone" name="telephone" required>
        </div>
        <div class="form-group">
          <label for="kamar">Nomor Kamar:</label>
          <select name="kamar" id="kamar">
            <option value="kamar-1">Kamar 1</option>
            <option value="kamar-2">Kamar 2</option>
            <option value="kamar-3">Kamar 3</option>
            <option value="kamar-4">Kamar 4</option>
            <option value="kamar-5">Kamar 5</option>
            <option value="kamar-6">Kamar 6</option>
            <option value="kamar-7">Kamar 7</option>
            <option value="kamar-8">Kamar 8</option>
            <option value="kamar-9">Kamar 9</option>
            <option value="kamar-10">Kamar 10</option>
          </select>
        </div>
        <div class="form-group" >
          <label for="durasi">Durasi Sewa:</label>
          <select id="durasi" name="durasi" required>
            <option value="6-bulan">6 Bulan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal Mulai Sewa:</label>
          <input type="date" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
          <p>*Untuk melakukan penyewaan kamar anda harus login terlebih dahulu <a href="login.php">Login disini</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
