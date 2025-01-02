<?php

use Dompdf\Dompdf;

if (file_exists('.env')) {
    $env = parse_ini_file('.env');
    $dbHost = $env["DB_HOST"];
    $dbUsername = $env["DB_USERNAME"];
    $dbPassword = $env["DB_PASSWORD"];
    $dbName = $env["DB_NAME"];
} else {
    $dbHost = getenv("DB_HOST");
    $dbUsername = getenv("DB_USERNAME");
    $dbPassword = getenv("DB_PASSWORD");
    $dbName = getenv("DB_NAME");
}

// Koneksi ke database
$connect_db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

function query($query)
{
    global $connect_db;
    $result = mysqli_query($connect_db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($data)
{
    global $connect_db;

    $username = strtolower(stripslashes($data["username"]));
    $email = mysqli_real_escape_string($connect_db, $data["email"]);
    $password = mysqli_real_escape_string($connect_db, $data["password"]); // mysqli_real_escape_string() -> agar user bisa memasukkan password yang mengandung karakter khusus

    // cek username sudah ada atau belum
    $result = mysqli_query($connect_db, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Username is already registered!',
                        icon: 'error'
                    });
                });
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($connect_db, "INSERT INTO user VALUES (null, '$username', '$email', '$password')");
    return mysqli_affected_rows($connect_db);
}

// function ubah($data)
// {
//     global $connect_db;
//     $id = $data["id"];
//     $nama = htmlspecialchars($data["nama"]);
//     $alamat = htmlspecialchars($data["alamat"]);
//     $keterangan = htmlspecialchars($data["keterangan"]);
//     $no_kamar = htmlspecialchars($data["no_kamar"]);

//     // query update data
//     $query = "UPDATE kamar SET nama = ?, alamat = ?, keterangan = ?, no_kamar = ? WHERE id = ?";
//     $stmt = mysqli_prepare($connect_db, $query);
//     if (!$stmt) {
//         die('mysqli error: ' . mysqli_error($connect_db));
//     }
//     mysqli_stmt_bind_param($stmt, "ssssi", $nama, $alamat, $keterangan, $no_kamar, $id);
//     mysqli_stmt_execute($stmt);

//     $affected_rows = mysqli_stmt_affected_rows($stmt);
//     mysqli_stmt_close($stmt);

//     return $affected_rows;
// }

function hapus($id)
{
    global $connect_db;
    mysqli_query($connect_db, "DELETE FROM pengaduan WHERE id = $id");
    return mysqli_affected_rows($connect_db);
}

function penyewaan($data)
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
    $query = "INSERT INTO penyewaan VALUES (null, '$nama', '$email', '$alamat', '$telephone', '$kamar', '$tanggal', '$durasi')";
    mysqli_query($connect_db, $query);
    return mysqli_affected_rows($connect_db);
}
