<?php
require 'functions.php';
include 'includes/header.php';
$page = 'datajurusan';
require 'islogin.php';

// Ambil semua data jurusan
$jurusan = query("SELECT * FROM jurusan");

// Ambil semua data mata kuliah
$mata_kuliah = query("SELECT * FROM matakuliah");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurusan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/stylejurusan.css">
</head>

<body>
    <div class="container">
        <div class ="box">
            <div class="table-container">
    <table>
        <tr>
            <th>No.</th>
            <th>Nama Jurusan</th>
            <th>Kode Jurusan</th>
            <th>Aksi</th>
            <th></th> <!-- Kolom untuk tombol expand -->
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($jurusan as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["nama_jurusan"] ?></td>
                <td><?= $row["kode_jurusan"] ?></td>
                <td>
                    <button><a id="a3" href="updatejurusan.php?kode_jurusan=<?= $row["kode_jurusan"] ?>">Ubah</a></button> |
                    <button><a id="a3" href="deletejurusan.php?kode_jurusan=<?= $row["kode_jurusan"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a></button>
                </td>
                <td>
                    <button class="expand-button collapsed" onclick="toggleExpand(this, 'row-<?= $i ?>')">
                        <i class="fa-solid fa-caret-down"></i>
        </button>
                </td>
            </tr>
            <tr id="row-<?= $i ?>" class="hidden-row" style="display: none;">
                <td colspan="5">
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                        <?php foreach ($mata_kuliah as $mk) : ?>
                            <?php if ($mk["kode_jurusan"] == $row["kode_jurusan"]) : ?>
                                <tr>
                                    <?php $temp2 = $mk["kode_mk"] ?>
                                    <td><?= $temp2 ?></td>
                                    <td><?= $mk["nama_mk"] ?></td>
                                    <td><?= $mk["sks"] ?></td>
                                    <td>
                                        <button><a id="a3" href="updatematkul.php?kode_mk=<?= $temp2 ?>">Ubah</a></button> |
                                        <button><a id="a3" href="deletematkul.php?kode_mk=<?= $temp2 ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a></button>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4"><button class="tambahdatamatkul"><a id="a2" href="tambahmatkul.php?kode_jurusan=<?= $row["kode_jurusan"] ?>">Tambah Mata Kuliah</a></button></td>
                        </tr>
                    </table>
                            </div>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
                            </div>
    <br>
    <button class="tambahdata"><a id="a2" href="tambahjurusan.php">Tambah Jurusan</a></button>
                            </div>
    <div id="popup" class="popup">
        <form id="popupForm" method="post">
            <input type="hidden" name="kode_mk" id="kode_mk">
            <input type="hidden" name="kode_jurusan" id="kode_jurusan">
        </form>
    </div>

    <script>
        function toggleExpand(button, rowId) {
            const row = document.getElementById(rowId);
            const icon = button.querySelector('i');
            if (row.style.display === "none" || row.style.display === "") {
                row.style.display = "table-row";
                button.classList.remove('collapsed');
                button.classList.add('expanded');
                icon.classList.remove('fa-caret-down');
                icon.classList.add('fa-caret-left');
            } else {
                row.style.display = "none";
                button.classList.remove('expanded');
                button.classList.add('collapsed');
                icon.classList.remove('fa-caret-left');
                icon.classList.add('fa-caret-down');
            }
        }

        function openPopup(action, kode_mk, nama_mk = '', sks = '', kode_jurusan = '') {
            const popup = document.getElementById('popup');
            const popupForm = document.getElementById('popupForm');
            const popupContent = document.getElementById('popupContent');

            document.getElementById('kode_mk').value = kode_mk;
            document.getElementById('kode_jurusan').value = kode_jurusan;

            if (action === 'edit') {
                popupForm.action = 'updatematkul.php';
                popupContent.innerHTML = `
                    <label for="nama_mk">Nama Mata Kuliah: </label>
                    <input type="text" name="nama_mk" id="nama_mk" value="${nama_mk}" required><br>
                    <label for="sks">SKS: </label>
                    <input type="number" name="sks" id="sks" value="${sks}" required><br>
                    <button type="submit">Ubah</button>
                `;
            } else if (action === 'delete') {
                popupForm.action = 'deletematkul.php?kode_jurusan=<?= $row["kode_jurusan"] ?>';
                popupContent.innerHTML = `
                    <p>Apakah Anda yakin ingin menghapus mata kuliah dengan kode ${kode_mk}?</p>
                    <button type="submit">Hapus</button>
                `;
            }

            popup.classList.add('active');
        }

        function closePopup() {
            const popup = document.getElementById('popup');
            popup.classList.remove('active');
        }
    </script>
</body>

</html>
