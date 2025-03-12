<?php
require 'connect_database.php'; // Include your DB connection

function getProductsByCategory($pdo, $fetch_item)
{
    if ($fetch_item === "All") {
        $stmt = $pdo->query("SELECT * FROM products");
    } else {
        $stmt = $pdo->prepare("SELECT products.* 
        FROM products
        JOIN product_categories ON products.product_id = product_categories.product_id
        JOIN categories ON product_categories.category_id = categories.category_id
        WHERE categories.Name = :category;
        ");
        $stmt->execute(['category' => $fetch_item]);
    }

    switch ($fetch_item) {
        case "All": {
                $stmt = $pdo->query("SELECT * FROM products");
            };
            break;
        case "Men":
        case "Women":
        case "Casual":
        case "Sport": {
                $stmt = $pdo->prepare("SELECT products.* 
                        FROM products
                        JOIN product_categories ON products.product_id = product_categories.product_id
                        JOIN categories ON product_categories.category_id = categories.category_id
                        WHERE categories.Name = :category;
                        ");
                $stmt->execute(['category' => $fetch_item]);
            };
            break;
        case "Nike":
        case "Adidas":
        case "Puma":
        case "New Balance":
        case "Converse":
        case "Jordan": {
                $stmt = $pdo->prepare("SELECT products.* 
                        FROM products
                        WHERE products.product_brand = :brand;
                        ");
                $stmt->execute(['brand' => $fetch_item]);
            };
            break;
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['category'])) {
    $category = $_GET['category'];
    $products = getProductsByCategory($pdo, $category);
    echo json_encode($products); // Return products as JSON
    exit;
}
