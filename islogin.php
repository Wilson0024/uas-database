<?php
if (!isset($_COOKIE['loggedin'])) {
    header("Location: auth/login.php");
    exit();
}
include('includes/header.php');
?>
