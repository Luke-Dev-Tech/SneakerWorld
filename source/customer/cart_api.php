<?php
session_start();
include("connect_database.php");
include("data.php");
// Check if the request is a POST and if JSON data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id'])) {
        if (!isset($_SESSION['cartItemsId'])) {
            $_SESSION['cartItemsId'] = [];
        }
        $_SESSION['cartItemsId'][] =
            [
                "id" => $data['id'],
                "shoeSize" => $data['shoeSize'],
                "priceTag" => $data['priceTag'],
                "amount" => 1
            ];

        // JSON Res
        echo json_encode(["success" => true]);
        exit(); // Prevent further output

    } else {
        echo json_encode(["success" => false, "message" => "Product ID missing."]);
        exit();
    }
}
