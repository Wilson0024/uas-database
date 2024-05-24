<?php
    require 'functions.php';

    if(isset($_POST["submit"])){
        if(tambahmhs($_POST) > 0){
           echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'datamhs.php';
            </script>";
        }
        else if(tambahmhs($_POST) == -1){
            echo "<script>
                 alert('dosen tidak ada di database');
                 document.location.href = 'datamhs.php';
             </script>";
         }
        else{
            echo "<script>
                alert('data gagal ditambahkan');
                document.location.href = 'datamhs.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Mahasiswa</title>
    <link rel="stylesheet" href="styletmbhmhs.css">
</head>
<body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
            <label for="npm">NPM : </label>
            <input type="text" name="npm" id="npm" required>
            </li>

            <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required>
            </li>

            <li>
            <label for="jenis_kelamin">Jenis Kelamin : </label>
            <input type="text" name="jenis_kelamin" id="jenis_kelamin" required>
            </li>

            <li>
            <label for="semester">Semester : </label>
            <input type="text" name="semester" id="semester" required>
            </li>

            <li>
            <label for="kode_jurusan">Kode Jurusan (2 digit pertama NPM) : </label>
            <input type="text" name="kode_jurusan" id="kode_jurusan" required>
            </li>

            <li>
            <label for=""nip>NIP Dosen Bimbingan : </label>
            <input type="text" name="nip" id="nip" required>
            </li>

            <button type="submit" name="submit">Tambah Data</button>
        </ul>
    </form>
</body>
</html>