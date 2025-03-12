<?php
include("adminCheckpoint.php");
include("connect.php");

try {
    // Fetching the other data of products.
    if (isset($_POST['submit'])) {
        $id = NULL;
        $user_name = $_POST['uname'];
        $user_email = $_POST['uemail'];
        $user_password = $_POST['upassword'];
        $user_role = $_POST['urole'];
        // Prepared statement to prevent SQL injection
        $sql = "INSERT INTO users(user_id, user_name, user_email, user_password,  user_role) 
                VALUES (:id, :user_name, :user_email, :user_password, :user_role)";
        $stmt = $pdo->prepare($sql);

        // Binding parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_email', $user_email);
        $stmt->bindParam(':user_password', $user_password);
        $stmt->bindParam(':user_role', $user_role);

        // Executing the query
        if ($stmt->execute()) {
            echo "Data inserted successfully!";
        } else {
            echo "Failed to insert data.";
        }
    }
} catch (Exception $e) {
    die("Cannot insert data: " . $e->getMessage());
}
