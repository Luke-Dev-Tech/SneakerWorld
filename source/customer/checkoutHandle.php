<?php
session_start();
include("connect_database.php");
include("data.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head_data.php") ?>
    <title>Status</title>
</head>

<body>
    <?php

    function addToDatabase($pdo, $itemDetailsToBeAdded)
    {
        try {
            // Fetching the other data of products.
            $id = NULL;
            $user_id = $_SESSION['userId']; // Fixed
            $product_id = $itemDetailsToBeAdded["id"];
            $record_date = date('Y-m-d');  // Fixed
            $order_amount = $itemDetailsToBeAdded["amount"];
            $total_cost = $itemDetailsToBeAdded["price"];
            $address = $_POST['address'];  // Fluid
            $phone_number = $_POST['phoneNum']; // Fluid
            $shoe_size = $itemDetailsToBeAdded["size"];
            $paymentMethod = $_POST['payment'];
            $paymentStatus = "Pending";
            $deliveredStatus = 0;

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
            } else {
                echo "<script>alert('Failed to insert Data.')</script>";
                header("location: index.php");
            }
        } catch (Exception $e) {
            die("Cannot insert data: " . $e->getMessage());
        }
    }



    // Starts from here ... 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $productDetailsInfo = [];     // Array to count occurrences

        // Loop through the array to count the ids
        foreach ($_SESSION['cartItemsId'] as $item) {
            $key = $item['id'] . '-' . $item['shoeSize']; // Composite key [awesome] ****  
            if (isset($productDetailsInfo[$key])) {
                $productDetailsInfo[$key]['id'] = $item['id'];
                $productDetailsInfo[$key]['size'] = $item['shoeSize'];
                $productDetailsInfo[$key]["amount"]++;
                $productDetailsInfo[$key]["price"] = getProductPrice($pdo, $item['id']) * $productDetailsInfo[$key]["amount"];
            } else {
                $productDetailsInfo[$key]['id'] = $item['id'];
                $productDetailsInfo[$key]['size'] = $item['shoeSize'];
                $productDetailsInfo[$key]["amount"] = 1;
                $productDetailsInfo[$key]["price"] = getProductPrice($pdo, $item['id']);
            }
        }
        foreach ($productDetailsInfo as $individualProduct) {
            addToDatabase($pdo, $individualProduct);
        }
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
                title: 'Thank you! Your purchase history has been recorded.',
                text: 'Your sneakers will be on their way soon.',
                icon: 'success',
                confirmButtonText: 'Continue Shopping',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
            </script>";
        unset($_SESSION['cartItemsId']);
    } else {
        header("location: shoppingcart.php");
    }


    ?>
</body>

</html>