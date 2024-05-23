<?php
require 'functions.php';
require 'islogin.php';

$jurusan = query("SELECT * FROM jurusan");

if (isset($_POST["cari"])) {
    $jurusan = carijurusan($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="stylejurusan.css">
</head>

<body>
    <h1>Data Jurusan</h1>

    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Kode Jurusan</th>
            <th>Nama Jurusan</th>
        </tr>

        <?php $i = 1 ?>

        <?php foreach ($jurusan as $row) : ?>

            <tr>
                <td><?= $i ?></td>
                <td><?= $row["kode_jurusan"] ?></td>
                <td><?= $row["nama_jurusan"] ?></td>
                <td>
                    <button><a href="updatejurusan.php?kode_jurusan=<?= $row["kode_jurusan"]; ?>">Ubah</a></button> |
                    <button><a href="deletejurusan.php?kode_jurusan=<?= $row["kode_jurusan"]; ?>">hapus</a></button>
                </td>
            </tr>

            <?php $i++ ?>

        <?php endforeach ?>

    </table>

    <a href="tambahjurusan.php">Tambah Data Jurusan</a>

</body>

</html>

<?php
include('includes/footer.php');
?>