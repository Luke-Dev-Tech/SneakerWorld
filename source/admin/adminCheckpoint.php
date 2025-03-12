<?php
session_start();
// If the user is not logged in, suggest him to login
if ($_SESSION['loggedIn'] != 1 or !isset($_SESSION['role']) or $_SESSION['role'] != "Admin") {
    header("location: ../customer/login.php");
}
