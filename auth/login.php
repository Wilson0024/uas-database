<?php
if (isset($_POST["submit"])) {
    if ($_POST["Username"] == "admin" && $_POST["Pass"] == "123") {
        setcookie("loggedin", true, time() + (1800 * 1), "/");
        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../assets/css/stylelogin.css">
</head>

<body>
    <form class="box" action="" method="POST">
        <h1>Login as admin</h1>
        <?php if (isset($error)) : ?>
            <p class="error">Password/Username salah!</p>
        <?php endif ?>
        <input type="text" name="Username" placeholder="Username" required>
        <input type="password" name="Pass" placeholder="Password" required>
        <input type="submit" name="submit" value="Login">
    </form>
</body>

</html>
