<?php
require 'functions.php';
require 'islogin.php';

if (isset($_POST["submit"])) {
    if(tambahjurusan($_POST) > 0){
        echo "<script>
             alert('data berhasil ditambahkan');
             document.location.href = 'datajurusan.php';
         </script>";
     }
     else if(tambahjurusan($_POST) == -1){
        echo "<script>
             alert('data gagal ditambahkan karena KODE JURUSAN sudah ada');
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
    <title>Tambah Jurusan</title>
    <link rel="stylesheet" href="assets/css/tmbhjurusan.css">
</head>

<body>
    <div class="box">
    <h1>Tambah Jurusan</h1>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="kode_jurusan">Kode Jurusan: </label>
                    <input type="text" name="kode_jurusan" id="kode_jurusan" required>
                </li>
                <li>
                    <label for="nama_jurusan">Nama Jurusan: </label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" required>
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data</button>
                </li>
            </ul>
        </form>
        
    </div>
</body>

</html>