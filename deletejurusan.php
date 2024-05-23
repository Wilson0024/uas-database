<?php
    require 'functions.php';

    $kode_jurusan = $_GET["kode_jurusan"];
    if(hapusjurusan($kode_jurusan)>0) {
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