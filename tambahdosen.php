<?php
    require 'functions.php';
    require 'islogin.php';

    if(isset($_POST["submit"])){
        if(tambahdosen($_POST) > 0){
           echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'datadosen.php';
            </script>";
        }
        else if(tambahdosen($_POST) == -1){
            echo "<script>
                alert('data gagal ditambahkan karena NIP dosen sudah ada');
                document.location.href = 'datadosen.php';
            </script>";
        }
        else{
            echo "<script>
                alert('data gagal ditambahkan karena NIP dosen sudah ada');
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
    <title>Tambah Data Dosen</title>
    <link rel="stylesheet" href="assets/css/tmbhdosen.css">
</head>
<body>
    <div class="box">
        <h1>Tambah Data Dosen</h1>
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
    </div>
</body>
</html>