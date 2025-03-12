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

// -----------------------------------------------
function getSpecificUser($pdo, $id)
{
    $sql = "SELECT user_id AS ID, user_name AS Name, user_email AS Email, user_password AS Password, user_role AS Role FROM users WHERE user_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function getUsers($pdo)
{
    $sql = "SELECT user_id AS ID, user_name AS Name, user_email AS Email, user_password AS Password, user_role AS Role FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getSpecificUserName($pdo, $id)
{
    $sql = "SELECT user_name AS Name WHERE user_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $username = $stmt->fetch(PDO::FETCH_ASSOC);
    return $username ? $username['Name'] : "Anonymous";
}

// -----------------------------------------------
function getSpecificOrder($pdo, $id)
{
    $sql = "SELECT record_id AS recordID, product_id AS productID, user_id AS userID, record_date As recordDate, ordered_amount AS orderAmount, total_cost AS totalCost, address AS address, phone_num AS phoneNum, shoe_size AS shoeSize, payment_method AS paymentMethod, payment_status AS paymentStatus, delivered_status AS deliveredStatus FROM order_records WHERE record_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $orderRec = $stmt->fetch(PDO::FETCH_ASSOC);
    return $orderRec;
}

function getOrders($pdo)
{
    $sql = "SELECT record_id AS recordID, product_id AS productID, user_id AS userID, record_date As recordDate, ordered_amount AS orderAmount, total_cost AS totalCost, address AS address, phone_num AS phoneNum, shoe_size AS shoeSize, payment_method AS paymentMethod, payment_status AS paymentStatus, delivered_status AS deliveredStatus FROM order_records";
    $stmt = $pdo->query($sql);
    $orderRecs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $orderRecs;
}
// -----------------------------------------------
function getOrderStats($pdo)
{
    $sql = "
        SELECT 
            SUM(ordered_amount) AS TotalSales,
            SUM(total_cost) AS TotalRevenue,
            COUNT(*) AS TotalOrders,
            SUM(CASE WHEN delivered_status = 0 THEN 1 ELSE 0 END) AS PendingOrders
        FROM order_records
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $stats = $stmt->fetch(PDO::FETCH_ASSOC);

    return [
        'total_sales' => $stats['TotalSales'] ?? 0,
        'total_revenue' => $stats['TotalRevenue'] ?? 0,
        'total_orders' => $stats['TotalOrders'] ?? 0,
        'pending_orders' => $stats['PendingOrders'] ?? 0
    ];
}
