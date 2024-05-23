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
    <link rel="stylesheet" href="style.css">
    <style>
        /* Pop-up styling */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .popup.success {
            border: 2px solid green;
        }

        .popup.error {
            border: 2px solid red;
        }

        .popup button {
            margin-top: 10px;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <h1>Tambah Jurusan</h1>

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
        <button onclick="closePopup()">OK</button>
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
</body>

</html>