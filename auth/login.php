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
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            width: 80%;
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            width: auto;
            margin: 10px 5px 10px 0;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }

        p {
            margin: 15px 0;
            color: #4CAF50;
            text-align: center;
            font-weight: bold;
        }
    </style>
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