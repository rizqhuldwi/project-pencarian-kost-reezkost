<?php
require 'vendor/autoload.php';
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

$connect_db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
$user = mysqli_query($connect_db, "SELECT * FROM tukijo ORDER BY id DESC LIMIT 1");

$r = mysqli_fetch_array($user);
$nama = $r['nama'];
$alamat = $r['alamat'];
$telephone = $r['telephone'];
$kamar = $r['kamar'];
$tanggal = $r['tanggal'];
$durasi = $r['durasi'];

use Dompdf\Dompdf;

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Kamar | Kost Tukijo</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</head>
<body>' .
    '<h1>Nota Boking Kamar | Kost Tukijo</h1> <br>' .
    '<br>' .
    '<table border="1" cellpadding="10" cellspacing="0" width="100%">' .
    '<tr>' .
    '<th>Nama</th>' .
    '<th>Alamat</th>' .
    '<th>Nomor Telepon</th>' .
    '<th>Nomor Kamar</th>' .
    '<th>Tanggal Mulai Sewa</th>' .
    '<th>Durasi Sewa</th>' .
    '</tr>' .
    '<tr>' .
    '<td>' . $nama . '</td>' .
    '<td>' . $alamat . '</td>' .
    '<td>' . $telephone . '</td>' .
    '<td>' . $kamar . '</td>' .
    '<td>' . $tanggal . '</td>' .
    '<td>' . $durasi . '</td>' .
    '</tr>' .
    '</table>' .
    '<br>' .
    '<h2>Total Tagihan Pembayaran : Rp 500.000</h2>' .
    '<p>Terima kasih telah melakukan pemesanan kamar di Kost Tukijo. 
    Untuk uang muka bisa dimulai dengan melakukan pembayaran kurang lebih sebesar Rp 200.000.
    Silahkan hubungi nomor berikut <b>0815-7915-650 (pemilik kost)</b> untuk melakukan pembayaran dan konfirmasi pemesanan.<br>
    Silahkan download nota ini untuk bukti pemesanan kamar anda, Terima Kasih.
    </p>' .
    '<hr>' .
    '</body>
</html>
';
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('nota_boking_kamar.pdf', ["Attachment" => 0]);
