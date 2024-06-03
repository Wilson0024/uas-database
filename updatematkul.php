<?php
require 'functions.php';
require 'islogin.php';
$kode_mk = $_GET["kode_mk"];

$result = query("SELECT * FROM matakuliah WHERE kode_mk = '$kode_mk'")[0];

if (isset($_POST["submit"])) {
    if (updatematkul($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'datajurusan.php';
            </script>";
    } else {
        echo "<script>
                alert('data gagal diubah');
                document.location.href = 'datajurusan.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Jurusan</title>
    <link rel="stylesheet" href="assets/css/styleupmatkul.css">
</head>

<body>
    <div class="box">
    <h1>Ubah Data Matkul</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="kode_matkul">Kode Mata kuliah : </label>
                    <input type="text" name="kode_mk" id="kode_matkul" required value="<?= $result["kode_mk"]; ?>" readonly>
                </li>
                <li>
                    <label for="nama_mk">Nama Mata Kuliah : </label>
                    <input type="text" name="nama_mk" id="nama_mk" required value="<?= $result["nama_mk"]; ?>">
                </li>
                <li>
                    <label for="sks">SKS : </label>
                    <input type="text" name="sks" id="sks" required value="<?= $result["sks"]; ?>">
                </li>
                
                <button type="submit" name="submit">Ubah Data</button>
            </ul>
        </form>
    </div>
</body>
</html>