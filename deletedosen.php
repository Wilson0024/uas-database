<?php
    require 'functions.php';
    require 'islogin.php';

    $nip = $_GET["nip"];
    if(hapusdosen($nip) > 0) {
        echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'datadosen.php';
        </script>";
    }
    else if(hapusdosen($nip) == -1){
        echo "<script>
            alert('data gagal dihapus karena masih ada mahasiswa yang dibimbing dosen ini');
            document.location.href = 'datadosen.php';
        </script>";
    }
    else{
        echo "<script>
            alert('data gagal dihapus');
            document.location.href = 'datadosen.php';
        </script>";
    }
?>