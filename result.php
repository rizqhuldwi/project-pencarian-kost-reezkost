<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="shortcut icon" href="img/kost.png" type="img/x-icon">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            width: 300px;
        }

        .image-container {
            position: relative;
        }

        .image-container img {
            width: 100%;
            border-radius: 8px;
        }

        .badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: purple;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .info {
            margin-top: 10px;
        }

        .category {
            font-weight: bold;
            color: #555;
        }

        .price {
            margin-top: 10px;
        }

        .final-price {
            font-size: 1.2em;
            color: rgb(12, 230, 103);
        }
    </style>
</head>

<body>
    <h1>Hasil Pencarian</h1>
    <div id="resultContainer" class="card-container">
    </div>
    <script>
        // Data kost from PHP to JavaScript
        const data = <?php echo json_encode($data); ?>;

        // Ambil parameter kata kunci dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const keyword = urlParams.get('keyword')?.toLowerCase() || '';

        const resultContainer = document.getElementById('resultContainer');

        // Filter data berdasarkan kata kunci
        const filteredData = data.filter(
            item =>
            item.name.toLowerCase().includes(keyword) ||
            item.city.toLowerCase().includes(keyword)
        );

        // Tampilkan hasil pencarian
        if (filteredData.length > 0) {
            filteredData.forEach(item => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
          <h3>${item.name}</h3>
          <p>${item.city}</p>
        `;
                resultContainer.appendChild(card);
            });
        } else {
            resultContainer.innerHTML = '<p>Tidak ada kata kunci yang ditemukan.</p>';
        }
    </script>
</body>

</html>
<?php
// Ambil parameter kata kunci dari URL
$keyword = isset($_GET['keyword']) ? strtolower($_GET['keyword']) : '';

// Data kost
$data = [
    [
        'name' => 'Kost Nasocha',
        'city' => 'Yogyakarta',
        'image' => 'img/kost1.jpg',
        'category' => 'Putra',
        'description' => 'Akses 24 Jam',
        'price' => 'Rp 2.100.000 <small>(6 Bulan)</small>',
        'link' => 'detail-nasocha.php'
    ],
    [
        'name' => 'Kost Lusi',
        'city' => 'Yogyakarta',
        'image' => 'img/kost-lusi1.jpg',
        'category' => 'Putra',
        'description' => 'WiFi • Akses 24 Jam',
        'price' => 'Rp 665.000 <small>(Perbulan)</small>',
        'link' => 'detail-lusi.php'
    ],
    [
        'name' => 'Kost Tukijo',
        'city' => 'Yogyakarta',
        'image' => 'img/kost-tukijo.jpg',
        'category' => 'Putra',
        'description' => 'WiFi • Akses 24 Jam',
        'price' => 'Rp 500.000 <small>(Perbulan)</small>',
        'link' => 'detail-tukijo.php'
    ],
    [
        'name' => 'Kost Pak Bambang',
        'city' => 'Yogyakarta',
        'image' => 'img/kost-pk-bambang.jpg',
        'category' => 'Putra',
        'description' => 'WiFi • Akses 24 Jam',
        'price' => 'Rp 6.500.000 <small>(Pertahun)</small>',
        'link' => 'detail-pk-bambang.php'
    ],
    [
        'name' => 'Kost Ibu Hadi',
        'city' => 'Yogyakarta',
        'image' => 'img/kost-ibu-hadi.jpg',
        'category' => 'Putra',
        'description' => 'WiFi • Akses 24 Jam',
        'price' => 'Rp 5.000.000 <small>(Pertahun)</small>',
        'link' => 'detail-ibu-hadi.php'
    ],
];

// Filter data berdasarkan kata kunci
$filteredData = array_filter($data, function ($item) use ($keyword) {
    return strpos(strtolower($item['name']), $keyword) !== false || strpos(strtolower($item['city']), $keyword) !== false;
});

// Tampilkan hasil pencarian
if (!empty($filteredData)) {
    foreach ($filteredData as $item) {
        echo '<div class="card">';
        echo '<div class="image-container">';
        echo '<img src="' . $item['image'] . '" alt="Kost Image">';
        echo '<span class="badge purple">Tersedia</span>';
        echo '</div>';
        echo '<div class="info">';
        echo '<span class="category">' . $item['category'] . '</span>';
        echo '<h3>' . $item['name'] . '</h3>';
        echo '<p>' . $item['description'] . '</p>';
        echo '<div class="price">';
        echo '<span class="final-price">' . $item['price'] . '</span>';
        echo '</div>';
        echo '<a href="' . $item['link'] . '">Lihat Selengkapnya</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>Tidak ada hasil yang ditemukan.</p>';
    echo '<a href="index.php">&laquo Kembali</a>';
}
?>