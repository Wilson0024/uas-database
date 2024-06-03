<?php
    require 'islogin.php';
    $page = 'dashboard'; // Change this variable according to the active page
?>

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
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Database Universitas</h1>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>

<?php include 'includes/footer.php'; ?>