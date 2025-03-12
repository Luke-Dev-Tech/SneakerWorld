<?php
session_start();
include("connect_database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["form_type"]) && $_POST['form_type'] == "signUp_form") {
        // Get the user input
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        // Basic validation
        if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
            echo "All fields are required.";
            exit();
        }

        if ($password !== $repassword) {
            echo "Passwords do not match.";
            exit();
        }

        // No password hashing, store the password as plain text
        $plainPassword = $password;

        // Prepare the SQL statement to insert data
        $stmt = $pdo->prepare("INSERT INTO users (user_id, user_name, user_email, user_password, user_role) VALUES (NULL, :username, :email, :password, 'Client')");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $plainPassword); // Store plain text password

        if ($stmt->execute()) {
            echo "<script>
            alert('Registration Successful');
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 1000); // Redirects after 1 second
          </script>";
            exit(); // Ensure the script stops executing after the alert
        } else {
            echo "Error: Could not register user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <?php include("head_data.php") ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        overflow: hidden;
        /* Prevents scroll */

    }

    .signupcard {
        background-image: url("../../images/signup_bg.gif");
        background-size: contain;
        background-repeat: repeat;
        background-position: center;
        background-color: black;
    }
    </style>
</head>

<body class="signupcard vh-100 d-flex justify-content-center align-items-center">
    <div class="bg-secondary-subtle card shadow p-4 w-100" style="max-width: 500px;">
        <h5 class="pacifico-regular text-xl font-medium text-gray-900 dark:text-white text-center mb-3">Welcome to
            Seankers
            World</h5>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mb-2">
            <input type="hidden" name="form_type" value="signUp_form">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter username">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>

            <div class="mb-3">
                <label for="repassword" class="form-label">Re-Enter Password</label>
                <input type="password" name="repassword" class="form-control" placeholder="Re-enter password">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
        <a href="index.php" class="text-black-700	hover:underline dark:text-black-500 w-full text-center">
            <i class="fa-solid fa-house"></i> Home Page
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>