<?php
function getProducts($pdo)
{
    $sql = "SELECT product_id AS ID, product_name AS Name, product_brand AS Brand, product_description AS Description, product_price AS Price, product_rating AS Rating, product_stock AS Stock, product_pic AS Image FROM products";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

// Getting a specific item
function getSpecificProduct($pdo, $id)
{
    $sql = "SELECT product_id AS ID, product_name AS Name, product_brand AS Brand, product_description AS Description, product_price AS Price, product_rating AS Rating, product_stock AS Stock, product_pic AS Image FROM products WHERE product_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}

function getProductPrice($pdo, $id)
{
    $sql = "SELECT product_price AS Price FROM products WHERE product_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $price = $stmt->fetch(PDO::FETCH_ASSOC);
    return $price ? $price['Price'] : 0;
}

function getFeedbackWithUserAndProduct($pdo, $product_id)
{
    $sql = "
        SELECT 
            f.feedback_id, 
            f.feedback_text, 
            f.rating, 
            u.user_name, 
            p.product_name 
        FROM feedback f
        JOIN users u ON f.user_id = u.user_id
        JOIN products p ON f.product_id = p.product_id
        WHERE f.product_id = :product_id
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':product_id' => $product_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
