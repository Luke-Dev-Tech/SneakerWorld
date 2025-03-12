<?php
session_start(); // Start the session

if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = 0;
}
$_SESSION['cartItems'] = array(); // Empty Cart Array.

include("connect_database.php");
// Login Capture
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["form_type"]) && $_POST['form_type'] == "login_form") {
        $email = $_POST['login_user_email'];
        $password = $_POST['login_password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_email = :email");
        $stmt->bindParam(':email', $email); // Bind the email parameter
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user data

        if ($user &&  $password === $user['user_password']) {
            if ($user['user_role'] != "Admin") {
                // Normal customers
                // Set session variables
                $_SESSION['username'] = $user['user_name'];
                $_SESSION['userId'] = $user['user_id'];
                $_SESSION['userEmail'] = $user['user_email'];
                echo "<script> alert('Welcome! {$_SESSION['username']}'); </script>";
                $_SESSION['loggedIn'] = 1;
                $_SESSION['role'] = "Customer";
                header("location: index.php");
                exit();
            } else {
                // Admin 
                $_SESSION['loggedIn'] = 1;
                $_SESSION['role'] = "Admin";
                $_SESSION['username'] = $user['user_name'];
                $_SESSION['userId'] = $user['user_id'];
                $_SESSION['userEmail'] = $user['user_email'];
                header("location: ../admin/index.php");
                exit();
            }
        } else {
            echo '
                <script>
                if (confirm("User Not Found! Try Again...")) {
                    window.location.href = "login.php";
                } else {
                    window.location.href = "index.php";
                }</script>';
        }
    }
}
