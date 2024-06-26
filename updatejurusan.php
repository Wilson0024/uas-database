<?php
require 'functions.php';
require 'islogin.php';

$kode_jurusan = $_GET["kode_jurusan"];

$result = query("SELECT * FROM jurusan WHERE kode_jurusan = '$kode_jurusan'")[0];

if (isset($_POST["submit"])) {
    if (updatejurusan($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'datajurusan.php';
            </script>";
    } else {
        echo "<script>
                alert('data gagal diubah');
                document.location.href = 'datajurusan.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Jurusan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url(assets/hero-bg.png) no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
        }

        .box {
            background-color: rgba(200, 200, 200, 0.7); /* Transparent background */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 15px black;
            width: 400px;
            height: 270px;
            text-align: center;
            backdrop-filter: blur(0px); /* Apply blur effect */
            transition: background 0.3s, backdrop-filter 0.3s;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-size: 14px;
            color: black;
        }

        input[type="text"] {
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
            margin: 10px auto;
            margin-top: 2px;
            text-align: center;
            transition: width 0.25s, border-color 0.25s;
            width: 80%;
            font-family: 'Poppins', sans-serif;
        }

        input[type="text"]:focus {
            width: calc(80% + 10px);
            border: 2px solid black;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #C0C0C0;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 0px;
            width: 125px;
            height: 30px;
            line-height: 8px;
            transition: background-color 0.25s;
            font-family: 'Poppins', sans-serif;

        }

        button[type="submit"]:hover {
            background-color: #a5a3a3;
        }
    </style>
</head>

<body>
    <form class="box" action="" method="post">
        <h1>Ubah Data Jurusan</h1>
        <ul>
            <li>
                <label for="kode_jurusan" >Kode Jurusan : </label>
                <input type="text" name="kode_jurusan" id="kode_jurusan" required value="<?= $result["kode_jurusan"]; ?>" readonly>
            </li>
            <li>
                <label for="nama_jurusan" >Nama Jurusan : </label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" required value="<?= $result["nama_jurusan"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>

</html>
