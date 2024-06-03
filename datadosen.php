    <?php
    require 'islogin.php';
    require 'functions.php';

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
        <link rel="stylesheet" href="../assets/css/styledosen.css">
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="box">
            <form action="" method="post">
                <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
                <button type="submit" name="cari">Cari!</button>
            </form>

            <div class="table-container">
                <table>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($dosen as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["nip"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["jenis_kelamin"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td>
                                <button><a id="a3" href="updatedosen.php?nip=<?= $row["nip"]; ?>">Ubah</a></button> |
                                <button><a id="a3" href="deletedosen.php?nip=<?= $row["nip"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a></button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>

            <a class="a2" href="tambahdosen.php">Tambah Data Dosen</a>
        </div>
        
        <?php include('includes/footer.php'); ?>
    </body>

    </html>
