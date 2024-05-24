<?php
require 'functions.php';
require 'islogin.php';

$mahasiswa = query("SELECT m.npm, m.nama, m.jenis_kelamin, m.semester, j.nama_jurusan, d.nama AS nama_dosen
                    FROM mahasiswa m 
                    JOIN jurusan j 
                    ON m.kode_jurusan = j.kode_jurusan
                    JOIN dosen d
                    ON m.nip = d.nip");

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
    <link rel="stylesheet" href="stylemhs.css">
</head>

<body>
    <h1>Data Mahasiswa</h1>

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
            <th>Jurusan</th>
            <th>Dosen Pembimbing</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["npm"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["jenis_kelamin"]; ?></td>
                <td><?= $row["semester"]; ?></td>
                <td><?= $row["nama_jurusan"]; ?></td>
                <td><?= $row["nama_dosen"]?></td>
                <td>
                    <a href="updatemhs.php?npm=<?= $row["npm"]; ?>">Ubah</a> |
                    <a href="deletemhs.php?npm=<?= $row["npm"] ; ?>"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <a href="tambahmhs.php">Tambah Data Mahasiswa</a>
</body>

</html>

<?php
include('includes/footer.php');
?>