<?php
include("connect.php");
include("adminCheckpoint.php");
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE product_id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id,
]);
echo "Product Deleted.";
header("Location: product_table.php");
