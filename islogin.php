<?php
if (!isset($_COOKIE['loggedin'])) {
    header("Location: auth/login.php");
    exit();
}
?>
