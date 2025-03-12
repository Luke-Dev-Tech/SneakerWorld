<?php
include("adminCheckpoint.php");
include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE user_id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id,
]);
header("Location: user_table.php");
