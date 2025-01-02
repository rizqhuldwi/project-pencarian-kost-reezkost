<?php
require 'functions.php';
$data = query("SELECT * FROM penyewaan");
session_start();
echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Login Berhasil!',
            text: 'Selamat Datang Admin!',
            icon: 'success'
          });
        });
      </script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="shortcut icon" href="img/kost.png" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="data-user.php"><i class="fas fa-users"></i> Data User</a></li>
        <li><a href="data-kost-nasocha.php"><i class="fas fa-bed"></i> Data Kost Nasocha</a></li>
        <li><a href="data-kost-lusi.php"><i class="fas fa-bed"></i> Data Kost Lusi</a></li>
        <li><a href="data-kost-tukijo.php"><i class="fas fa-bed"></i> Data Kost Tukijo</a></li>
        <li><a href="data-kost-pk-bambang.php"><i class="fas fa-bed"></i> Data Kost Pak Bambang</a></li>
        <li><a href="data-kost-ibu-hadi.php"><i class="fas fa-bed"></i> Data Kost Ibu Hadi</a></li>
        <li><a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header>
        <h1>Selamat Datang, Admin</h1>
        <p id="clock"></p>
      </header>

      <div class="content">
        <img src="img/repair.png" alt="Deskripsi REEZKOST">
      </div>

      <!-- Data Table -->
      <!-- <section class="data-table">
        <h2>Data Masuk Penyewaan Kamar</h2>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Nomor Telepon</th>
              <th>Nomor Kamar</th>
              <th>Durasi Sewa</th>
              <th>Tanggal Mulai Sewa</th>
            </tr>
          </thead>
          <?php $i = 1; ?>
          <?php foreach ($data as $row) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $row["nama"]; ?></td>
              <td><?= $row["email"]; ?></td>
              <td><?= $row["alamat"]; ?></td>
              <td><?= $row["telephone"]; ?></td>
              <td><?= $row["kamar"]; ?></td>
              <td><?= $row["durasi"]; ?></td>
              <td><?= $row["tanggal"]; ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </table>
      </section> -->
    </main>
  </div>
  <script>
    function updateTime() {
      var now = new Date();
      var hours = now.getHours().toString().padStart(2, '0');
      var minutes = now.getMinutes().toString().padStart(2, '0');
      var seconds = now.getSeconds().toString().padStart(2, '0');
      document.getElementById('clock').innerText = hours + ':' + minutes + ':' + seconds;
    }
    setInterval(updateTime, 1000);
    updateTime();
  </script>
</body>

</html>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const logoutLink = document.querySelector('a[href="login.php"]');
    logoutLink.addEventListener('click', function(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan keluar dari sesi admin!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, logout!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'login.php';
        }
      });
    });
  });
</script>