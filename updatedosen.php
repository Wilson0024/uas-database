<?php
require 'functions.php';
$nip = $_GET["nip"];

$result = query("SELECT * FROM dosen WHERE nip = '$nip'")[0];

if (isset($_POST["submit"])) {
    if (updatedosen($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'datadosen.php';
            </script>";
    } else {
        echo "<script>
                alert('data gagal diubah');
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
    <title>Ubah data Dosen</title>
</head>

<body>
    <h1>Ubah data dosen</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nip">NIM : </label>
                <input type="text" name="nip" id="nip" required value="<?= $result["nip"]; ?>" readonly>
            </li>

            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $result["nama"]; ?>">
            </li>

            <li>
                <label for="jenis_kelamin">Jenis Kelamin (L/P) : </label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $result["jenis_kelamin"]; ?>">
            </li>

            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $result["email"]; ?>">
            </li>

            <button type="submit" name="submit">Ubah Data</button>
        </ul>
    </form>
</body>

</html>