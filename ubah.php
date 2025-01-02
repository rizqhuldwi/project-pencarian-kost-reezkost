<?php
require 'functions.php';
$id = htmlspecialchars($_GET["id"]);

// query data mahasiswa berdasarkan id
$kamar = query("SELECT * FROM kamar WHERE id = $id")[0];



// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {
    // ambil data dari tiap elemen dalam form

        // cek apakah data berhasil diubah atau tidak 
        if( ubah($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'admin.php';
            </script>
                ";
            } else {
                echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'admin.php';
                </script>
                ";
        }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Update data kamar</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $kamar["id"]; ?>">
        <ul>
            <li>
                <label for="nama"> Nama : </label>
                <input type="text" name="nama" id="nama"
                value="<?= $kamar["nama"]; ?>" 
                class="form-control" aria-label="default input example">
            </li>
            <li>
                <label for="alamat"> Alamat : </label>
                <input type="text" name="alamat" id="alamat"
                value="<?= $kamar["alamat"]; ?>"
                class="form-control" aria-label="default input example">
            </li>
            <li>
                <label for="keterangan"> Keterangan : </label>
                <input type="text" name="keterangan" id="keterangan"
                value="<?= $kamar["keterangan"]; ?>"
                class="form-control" aria-label="default input example">
            </li>
            <li>
                <label for="no_kamar"> Nomor Kamar : </label>
                <input type="text" name="no_kamar" id="no_kamar"
                value="<?= $kamar["no_kamar"]; ?>"
                class="form-control" aria-label="default input example">
            </li>

            <li>
                <button type="submit" name="submit" class="btn btn-success">Update data</button>
            </li>
        </ul>
    </form>



</body>
</html>