<?php
require 'functions.php';
$npm = $_GET["npm"];

$result = query("SELECT * FROM mahasiswa WHERE npm = $npm")[0];

if (isset($_POST["submit"])) {
    if (updatemhs($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'datamhs.php';
            </script>";
    } 
    else if (updatemhs($_POST) == -1) {
        echo "<script>
                alert('dosen tidak ada di database');
                document.location.href = 'datamhs.php';
            </script>";
    } 
    else {
        echo "<script>
                alert('data gagal diubah');
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
    <title>Ubah data Mahasiswa</title>
</head>

<body>
    <h1>Ubah data mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="npm">NPM : </label>
                <input type="text" name="npm" id="npm" required value="<?= $result["npm"]; ?>" readonly>
            </li>

            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $result["nama"]; ?>">
            </li>

            <li>
                <label for="jenis_kelamin">Jenis Kelamin : </label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $result["jenis_kelamin"]; ?>">
            </li>

            <li>
                <label for="semester">Semester : </label>
                <input type="text" name="semester" id="semester" required value="<?= $result["semester"]; ?>">
            </li>

            <li>
                <label for="kode_jurusan">Kode Jurusan : </label>
                <input type="text" name="kode_jurusan" id="kode_jurusan" required value="<?= $result["kode_jurusan"]; ?>">
            </li>

            <li>
                <label for="nip">NIP Dosen : </label>
                <input type="text" name="nip" id="nip" required value="<?= $result["nip"]; ?>">
            </li>

            <button type="submit" name="submit">Ubah Data</button>
        </ul>
    </form>
</body>

</html>