<?php
    require 'functions.php';

    $npm = $_GET["npm"];
    if(hapusmhs($npm)>0){
        echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'datamhs.php';
        </script>";
    }
    else{
        echo "<script>
            alert('data gagal dihapus');
            document.location.href = 'datamhs.php';
        </script>";
    }
?>