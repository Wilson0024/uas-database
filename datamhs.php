<?php
require 'functions.php';
require 'islogin.php';

$mahasiswa = query("SELECT npm, nama, jenis_kelamin, semester, kode_juru FROM mahasiswa");

if (isset($_POST["cari"])) {
    $mahasiswa = carimhs($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>


    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Semester</th>
            <th>kode Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1 ?>

        <?php foreach ($mahasiswa as $row) : ?>

            <tr>
                <td><?= $i ?></td>
                <td><?= $row["npm"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["jenis_kelamin"] ?></td>
                <td><?= $row["semester"] ?></td>
                <td><?= $row["kode_jurusan"] ?></td>
                <td>
                    <a href="updatemhs.php?npm=<?= $row["npm"] ?>">Ubah</a> |
                    <a href="deletemhs.php?npm=<?= $row["npm"] ?>">hapus</a>
                </td>
            </tr>

            <?php $i++ ?>

        <?php endforeach ?>



    </table>
    <a href="tambahmhs.php">Tambah Data Mahasiswa</a>
</body>

</html>

<?php
include('includes/footer.php');
?>