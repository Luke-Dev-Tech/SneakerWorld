<?php
session_start();
include("connect_database.php");
include("data.php");

// Decode the incoming JSON request
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($_SESSION['cartItemsId'])) {
    $itemId = $data['id'];

    // Remove the item from the session
    unset($_SESSION['cartItemsId'][$itemId]);
    $_SESSION['cartItemsId'] = array_values($_SESSION['cartItemsId']);

    // Recalculate the total cost
    $total_cost = 0;
    foreach ($_SESSION['cartItemsId'] as $cart_item_id) {
        $product_data = getSpecificProduct($pdo, $cart_item_id["id"]);
        $total_cost += $product_data['Price'];
    }

    // Return success and the new total cost
    echo json_encode(['success' => true, 'newTotal' => number_format($total_cost, 2)]);
    exit();
} else {
    echo json_encode(['success' => false]);
    exit();
}
