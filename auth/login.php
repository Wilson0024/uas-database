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
    <link rel = "stylesheet" href = "stylelogin.css">
</head>

<body>
    <h2>Login Admin</h2>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Password/Username salah!</p>
    <?php endif ?>
    <form action="" method="POST">
        <label for="user">Username: </label>
        <input type="text" name="Username" id="user">
        <label for="pass">Password: </label>
        <input type="password" name="Pass" id="pass">
        <input type="submit" name="submit" value="Login">
    </form>
</body>

</html>