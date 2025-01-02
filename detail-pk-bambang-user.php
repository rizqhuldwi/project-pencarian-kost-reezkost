<?php
require 'functions.php';
if (isset($_POST['ajukan_sewa'])) {
  if (penyewaan_pk_bambang($_POST) > 0) {
    header('Location: boking-kost-pk-bambang.php');
  } else {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Oops!',
                text: 'Data gagal terkirim!',
                icon: 'error'
            });
        });
    </script>";
  }
}

function penyewaan_pk_bambang($data)
{
  global $connect_db;
  $nama = mysqli_real_escape_string($connect_db, htmlspecialchars($data["nama"]));
  $email = mysqli_real_escape_string($connect_db, htmlspecialchars($data["email"]));
  $alamat = mysqli_real_escape_string($connect_db, htmlspecialchars($data["alamat"]));
  $telephone = mysqli_real_escape_string($connect_db, htmlspecialchars($data["telephone"]));
  $kamar = mysqli_real_escape_string($connect_db, htmlspecialchars($data["kamar"]));
  $tanggal = mysqli_real_escape_string($connect_db, htmlspecialchars($data["tanggal"]));
  $durasi = mysqli_real_escape_string($connect_db, htmlspecialchars($data["durasi"]));

  // query insert data
  $query = "INSERT INTO pk_bambang VALUES ('', '$nama', '$email', '$alamat', '$telephone', '$kamar', '$tanggal', '$durasi')";
  mysqli_query($connect_db, $query);
  return mysqli_affected_rows($connect_db);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kost | Kost Pak Bambang</title>
  <link rel="stylesheet" href="detail.css">
  <link rel="shortcut icon" href="img/kost.png" type="img/x-icon">
</head>

<body>
  <div class="container">
    <!-- Main Content -->
    <div class="main-content">
      <!-- Image Gallery -->
      <div class="image-gallery">
        <img class="main-image" src="img/kost-pk-bambang2.jpg" alt="Main Kost Image">
      </div>

      <!-- Kost Information -->
      <div class="kost-info">
        <h1>Kost Pak Bambang </h1>
        <p>Kost Pak Bambang adalah kost putra umum yang berlokasi di Trini, Trihanggo, Kec. Gamping, Kabupaten Sleman, Yogyakarta.
          Kost ini menyediakan fasilitas umum yang lengkap dan spesifikasi kamar yang nyaman. Kost ini hanya bisa melakukan
          penyewaan dalam waktu 1 Tahun / Pertahun.</p>
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
          <p> • Lemari</p>
          <hr>
        </div>
        <div class="facilities">
          <h3>Gallery</h3>
          <img class="box-image" src="img/kost-pk-bambang3.jpg" alt="Kost Nasocha" width="400">
          <img class="box-image" src="img/kost-pk-bambang4.jpg" alt="Kost Nasocha" width="400">
          <hr>
        </div>
        <div class="facilities">
          <h3>Lokasi</h3>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d442.14553870124996!2d110.35349790606068!3d-7.7493429370930675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a594fb719712d%3A0x7d46aa6c0c7c7da4!2sKos%20Pak%20Bambang%20D!5e0!3m2!1sid!2sid!4v1735573903659!5m2!1sid!2sid"
            width="400" height="300" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
          <hr>
          <a href="index-user.php">&laquo Kembali</a>
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
          </select>
        </div>
        <div class="form-group">
          <label for="durasi">Durasi Sewa:</label>
          <select id="durasi" name="durasi" required>
            <option value="12-bulan">12 Bulan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal Mulai Sewa:</label>
          <input type="date" id="tanggal" name="tanggal" required>
        </div>
        <a href="boking-kost-pk-bambang" target="_blank">
          <button type="submit" name="ajukan_sewa" class="apply-rent">Ajukan Sewa</button>
        </a>
      </form>
    </div>
  </div>
</body>

</html>