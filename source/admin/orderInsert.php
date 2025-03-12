<?php
include("connect.php");
include("adminCheckpoint.php");

try {
    // Fetching the other data of products.
    if (isset($_POST['submit'])) {
        print_r($_POST);
        $id = NULL;
        $user_id = $_POST['uId'];
        $product_id = $_POST['pId'];
        $record_date = $_POST['date'];
        $order_amount = $_POST['orderAmo'];
        $total_cost = $_POST['tCost'];
        $address = $_POST['address'];
        $phone_number = $_POST['pNum'];
        $shoe_size = $_POST['shoeSize'];
        $paymentMethod = $_POST['paymentMethod'];
        $paymentStatus = $_POST['paymentStatus'];
        $deliveredStatus = $_POST['deliveredStatus'];
        // Prepared statement to prevent SQL injection
        $sql = "INSERT INTO order_records( product_id, user_id, record_date, ordered_amount, total_cost, address, phone_num, shoe_size, payment_method, payment_status, delivered_status) 
                VALUES ( :pid, :uid, :rdate ,:orderedAmount, :totalCost, :address, :phoneNum, :shoeSize, :paymentMethod, :paymentStatus, :deliveredStatus)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pid', $product_id);
        $stmt->bindParam(':uid', $user_id);
        $stmt->bindParam(':rdate', $record_date);
        $stmt->bindParam(':orderedAmount', $order_amount);
        $stmt->bindParam(':totalCost', $total_cost);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phoneNum', $phone_number);
        $stmt->bindParam(':shoeSize', $shoe_size);
        $stmt->bindParam(':paymentMethod', $paymentMethod);
        $stmt->bindParam(':paymentStatus', $paymentStatus);
        $stmt->bindParam(':deliveredStatus', $deliveredStatus);
        if ($stmt->execute()) {
            echo "<script>alert('Data Inserted Successfully')</script>";
            header("location: orderTable.php");
        } else {
            echo "<script>alert('Failed to insert Data.')</script>";
            header("location: orderInsert.php");
        }
    }
} catch (Exception $e) {
    die("Cannot insert data: " . $e->getMessage());
}
