<?php
    require 'functions.php';

    if(isset($_POST["submit"])){
        if(tambahdosen($_POST) > 0){
           echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'datadosen.php';
            </script>";
        }
        else{
            echo "<script>
                alert('data gagal ditambahkan');
                document.location.href = 'datadosen.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Dosen</title>
</head>
<body>
    <h1>Tambah data Dosen</h1>

    <form action="" method="post">
        <ul>
            <li>
            <label for="nip">NIP : </label>
            <input type="text" name="nip" id="nip" required>
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
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" required>
            </li>

            <button type="submit" name="submit">Tambah Data</button>
        </ul>
    </form>
</body>
</html>