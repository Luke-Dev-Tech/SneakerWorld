<?php
include("adminCheckpoint.php");
include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM order_records WHERE record_id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id,
]);

header("Location: orderTable.php");
