<?php
require 'islogin.php';
?>

<h2>Dashboard</h2>
<p>Welcome, Admin!</p>

<div class="dashboard-links">
    <a href="datadosen.php" class="dashboard-link">Dosen</a>
    <a href="datamhs.php" class="dashboard-link">Mahasiswa</a>
    <a href="datajurusan.php" class="dashboard-link">Jurusan</a>
</div>

<?php
include('includes/footer.php');
?>