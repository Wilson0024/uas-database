<?php
    require 'functions.php';

    $kode = $_GET["kode_jurusan"];

    if(isset($_POST["submit"])){
        if(tambahmatkul($_POST, $kode) > 0){
           echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'datajurusan.php';
            </script>";
        }
        else{
            echo "<script>
                alert('data gagal ditambahkan');
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
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="styletmbhmhs.css">
</head>
<body>
    <h1>Tambah Mata Kuliah</h1>

    <form action="" method="post">
        <ul>
            <li>
            <label for="nama">Nama Mata Kuliah : </label>
            <input type="text" name="nama_matkul" id="nama" required>
            </li>

            <li>
            <label for="sks ">SKS : </label>
            <input type="text" name="sks" id="sks" required>
            </li>


            <button type="submit" name="submit">Tambah Data</button>
        </ul>
    </form>
</body>
</html>