<?php
require 'functions.php';
$kode_jurusan = $_GET["kode_jurusan"];

$result = query("SELECT * FROM jurusan WHERE kode_jurusan = '$kode_jurusan'")[0];

if (isset($_POST["submit"])) {
    if (updatejurusan($_POST) > 0) {
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
    <title>Ubah data Jurusan</title>
    <link rel="stylesheet" href="styleupjurusan.css">
</head>

<body>
    <h1>Ubah data jurusan</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="kode_jurusan">Kode Jurusan : </label>
                <input type="text" name="kode_jurusan" id="kode_jurusan" required value="<?= $result["kode_jurusan"]; ?>" readonly>
            </li>
            <li>
                <label for="nama_jurusan">Nama Jurusan : </label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" required value="<?= $result["nama_jurusan"]; ?>">
            </li>

            <button type="submit" name="submit">Ubah Data</button>
        </ul>
    </form>
</body>

</html>