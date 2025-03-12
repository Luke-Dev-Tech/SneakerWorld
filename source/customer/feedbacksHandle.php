<?php
include("connect_database.php");
session_start();
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] != 1) {
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

if (isset($_POST["product_id"], $_POST["feedback_text"], $_POST["feedback_rating"])) {
    if (isset($_POST)) {
    }
    $user_id = $_SESSION["userId"];
    $product_id = $_POST["product_id"];
    $feedback_text = $_POST["feedback_text"];
    $feedback_rating = $_POST["feedback_rating"];
    $sql = "INSERT INTO feedback(product_id, user_id, feedback_text, rating) 
            VALUES ( :pid, :uid ,:ftext, :frating)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pid', $product_id);
    $stmt->bindParam(':uid', $user_id);
    $stmt->bindParam(':ftext', $feedback_text);
    $stmt->bindParam(':frating', $feedback_rating);

    if ($stmt->execute()) {
        echo "<script>window.location.href = 'productDetails.php?id=$product_id'</script>";
    } else {
        echo "<script>alert('Failed to insert Data.')</script>";
        header("location: index.php");
    }
}
