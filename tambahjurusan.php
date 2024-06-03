<?php
require 'functions.php';

$popup_message = "";
$popup_type = ""; // 'success' or 'error'

if (isset($_POST["submit"])) {
    if (tambahjurusan($_POST) > 0) {
        $popup_message = "Data berhasil ditambahkan";
        $popup_type = "success";
    } else {
        $popup_message = "Data gagal ditambahkan";
        $popup_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurusan</title>
    <link rel="stylesheet" href="../assets/css/styletmbhjurusan.css">
</head>

<body>
    <h1>Tambah Jurusan</h1>
    <div class="box">
        <form action="" method="post">
            <ul>
                <li>
                    <label for="kode_jurusan">Kode Jurusan: </label>
                    <input type="text" name="kode_jurusan" id="kode_jurusan" required>
                </li>
                <li>
                    <label for="nama_jurusan">Nama Jurusan: </label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" required>
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data</button>
                </li>
            </ul>
        </form>
        
        <!-- Pop-up -->
        <div class="overlay" id="overlay"></div>
        <div class="popup <?= $popup_type ?>" id="popup">
            <p><?= $popup_message ?></p>
        </div>
        
        <script>
            // Show popup if there's a message
            const popupMessage = "<?= $popup_message ?>";
            if (popupMessage) {
                document.getElementById('popup').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            }
            
            // Close popup function
            function closePopup() {
                document.getElementById('popup').style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
                // Redirect to datajurusan.php after closing the popup
                window.location.href = 'datajurusan.php';
            }
        </script>
    </div>
</body>

</html>