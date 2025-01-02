<?php
require 'functions.php';
if (isset($_POST['ajukan_sewa'])) {
  if (penyewaan_ibu_hadi($_POST) > 0) {
    header('Location: boking-kost-ibu-hadi.php');
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

function penyewaan_ibu_hadi($data)
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
  $query = "INSERT INTO ibu_hadi VALUES (null, '$nama', '$email', '$alamat', '$telephone', '$kamar', '$tanggal', '$durasi')";
  mysqli_query($connect_db, $query);
  return mysqli_affected_rows($connect_db);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kost | Kost Ibu Hadi</title>
  <link rel="stylesheet" href="detail.css">
  <link rel="shortcut icon" href="img/kost.png" type="img/x-icon">
</head>

<body>
  <div class="container">
    <!-- Main Content -->
    <div class="main-content">
      <!-- Image Gallery -->
      <div class="image-gallery">
        <img class="main-image" src="img/kost-ibu-hadi.jpg" alt="Main Kost Image">
      </div>

      <!-- Kost Information -->
      <div class="kost-info">
        <h1>Kost Ibu Hadi </h1>
        <p>Kost Ibu Hadi adalah kost putra umum yang berlokasi di Sebrang UTY Kampus 1/ UTY Jombor 50 meter,
          Ngemplak Nganti, Mlati, Sleman, Yogyakarta.
          Kost ini menyediakan fasilitas umum yang lengkap dan spesifikasi kamar yang nyaman.
          Kost ini hanya bisa melakukan penyewaan dalam waktu 1 Tahun / Pertahun.</p>
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
          <p> • Catatan : Untuk nomor kamar 1-6 berada di lantai bawah dan nomor kamar 7-12 berada di lantai
            dua</p>
          <hr>
        </div>
        <div class="facilities">
          <h3>Gallery</h3>
          <img class="box-image" src="img/kost-ibu-hadi2.jpg" alt="Kost Tukijo" width="400">
          <img class="box-image" src="img/kost-ibu-hadi3.jpg" alt="Kost Tukijo" width="400">
          <hr>
        </div>
        <div class="facilities">
          <h3>Lokasi</h3>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253018.61893767363!2d110.190380078125!3d-7.745631499999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5994bf5910bd%3A0x842b39c2ebd2ada1!2sKost%20Putra%20Ibu%20Hadi!5e0!3m2!1sid!2sid!4v1735720427123!5m2!1sid!2sid"
            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
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
            <option value="kamar-9">Kamar 9</option>
            <option value="kamar-10">Kamar 10</option>
            <option value="kamar-11">Kamar 11</option>
            <option value="kamar-12">Kamar 12</option>
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
        <a href="boking-kost-ibu-hadi" target="_blank">
          <button type="submit" name="ajukan_sewa" class="apply-rent">Ajukan Sewa</button>
        </a>
      </form>
    </div>
  </div>
</body>

</html>