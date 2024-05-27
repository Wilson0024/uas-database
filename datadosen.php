<?php
require 'functions.php';
require 'islogin.php';

$dosen = query("SELECT * FROM dosen");

if (isset($_POST["cari"])) {
    $dosen = caridosen($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styledosen.css">
</head>

<body>
    <h1>Data Dosen</h1>

    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1 ?>

        <?php foreach ($dosen as $row) : ?>

            <tr>
                <td><?= $i ?></td>
                <td><?= $row["nip"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["jenis_kelamin"] ?></td>
                <td><?= $row["email"] ?></td>
                <td>
                    <button><a href="updatedosen.php?nip=<?= $row["nip"] ?>">Ubah</a></button> |
                    <button><a href="deletedosen.php?nip=<?= $row["nip"] ?>"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">hapus</a></button>
                </td>
            </tr>

            <?php $i++ ?>

        <?php endforeach ?>

    </table>

    <a href="tambahdosen.php">Tambah Data Dosen</a>

</body>

</html>

<?php
include('includes/footer.php');
?>