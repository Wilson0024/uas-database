<?php
require 'functions.php';
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
    <link rel="stylesheet" href="../assets/css/stylejurusan.css">
    <style>
        .expand-button {
            cursor: pointer;
        }
        .expand-button i {
            transition: transform 0.3s ease;
            transform: rotate(90deg);
        }
        .expand-button.expanded i {
            transform: rotate(0deg);
        }
        .hidden-row {
            display: none;
        }
    </style>
</head>

<body>
    <div class="box">

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
                <th></th> <!-- Kolom untuk tombol expand -->
            </tr>
            
            <?php $i = 1; ?>
            <?php foreach ($jurusan as $row) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["kode_jurusan"] ?></td>
                    <td><?= $row["nama_jurusan"] ?></td>
                    <td>
                        <button><a id="a2" href="updatejurusan.php?kode_jurusan=<?= $row["kode_jurusan"] ?>">Ubah</a></button> |
                        <button><a id="a2" href="deletejurusan.php?kode_jurusan=<?= $row["kode_jurusan"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a></button>
                    </td>
                    <td>
                        <div class="expand-button collapsed" onclick="toggleExpand(this, 'row-<?= $i ?>')">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </td>
                </tr>
                <tr id="row-<?= $i ?>" class="hidden-row">
                    <td colspan="5">
                        <table border="1" cellpadding="10" cellspacing="0">
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
                                        <button><a id="a4" href="updatematkul.php?kode_mk=<?= $temp2 ?>">Ubah</a></button> |
                                        <button><a id="a4" href="deletematkul.php?kode_mk=<?= $temp2 ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a></button>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4"><a id="a5" href="tambahmatkul.php?kode_jurusan=<?= $row["kode_jurusan"] ?>">Tambah Mata Kuliah</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
                
                <br>
                <a href="tambahjurusan.php" class="btn-primary">Tambah Jurusan</a>

                <div id="popup" class="popup">
        <form id="popupForm" method="post">
            <input type="hidden" name="kode_mk" id="kode_mk">
            <input type="hidden" name="kode_jurusan" id="kode_jurusan">
            <div id="popupContent"></div>
            <button type="button" onclick="closePopup()">Batal</button>
        </form>
    </div>

    <script>
        function toggleExpand(button, rowId) {
            const row = document.getElementById(rowId);
            if (row.style.display === "none" || row.style.display === "") {
                row.style.display = "table-row";
                button.classList.remove('collapsed');
                button.classList.add('expanded');
            } else {
                row.style.display = "none";
                button.classList.remove('expanded');
                button.classList.add('collapsed');
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
    </div>
</body>

</html>

<?php
include ('includes/footer.php');
?>