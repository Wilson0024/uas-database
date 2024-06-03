<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="assets/css/stylenavbar.css" rel="stylesheet">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#"><img src="assets/logo.png" width="50" height="50"></a> <!-- Put Logo Here -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">LOGO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 <?php echo ($page == 'dashboard') ? 'active' : ''; ?>" href="dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 <?php echo ($page == 'datadosen') ? 'active' : ''; ?>" href="datadosen.php">Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 <?php echo ($page == 'datamhs') ? 'active' : ''; ?>" href="datamhs.php">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 <?php echo ($page == 'datajurusan') ? 'active' : ''; ?>" href="datajurusan.php">Jurusan</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="auth/logout.php" class="login-button">Logout</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- navbar end -->
