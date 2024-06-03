<?php
    require 'functions.php';
    require 'islogin.php';

    $kode_mk = $_GET["kode_mk"];
    if(hapusmatkul($kode_mk)>0) {
        echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'datajurusan.php';
        </script>";
    }
    else {
        echo "<script>
            alert('data gagal dihapus');
            document.location.href = 'datajurusan.php';
        </script>";
    }
?>