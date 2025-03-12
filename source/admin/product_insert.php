<?php
include("adminCheckpoint.php");
include("connect.php");

try {
    // Fetching the img
    if (isset($_FILES['img'])) {
        $target = $_FILES['img']['name']; // Corrected the variable name from $terget to $target
        $tmp = $_FILES['img']['tmp_name'];
        $targetDir = "../../images/uploaded/" . $target; // Target directory to store the uploaded image
        move_uploaded_file($tmp, $targetDir); // Moving the uploaded image to the target directory
    }


    // Fetching the other data of products.
    if (isset($_POST['submit'])) {
        $id = $_POST['pid'];
        $product_name = $_POST['pname'];
        $product_brand = $_POST['pbrand'];
        $product_description = $_POST['pdescription'];
        $product_price = $_POST['pprice'];
        $product_rating = $_POST['prating'];
        $product_stock = $_POST['pstock'];

        // Prepared statement to prevent SQL injection
        $sql = "INSERT INTO products(product_id, product_name, product_brand, product_description, product_price, product_rating, product_stock, product_pic) 
                VALUES (:id, :product_name, :product_brand, :product_description, :product_price, :product_rating, :product_stock, :product_pic)";
        $stmt = $pdo->prepare($sql);

        // Binding parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':product_brand', $product_brand);
        $stmt->bindParam(':product_description', $product_description);
        $stmt->bindParam(':product_price', $product_price);
        $stmt->bindParam(':product_rating', $product_rating);
        $stmt->bindParam(':product_stock', $product_stock);
        $stmt->bindParam(':product_pic', $targetDir);

        // Executing the query
        if ($stmt->execute()) {
            echo "<script> window.location.href = 'product_table.php'; </script>";
        } else {
            echo "Failed to insert data.";
        }
    }
} catch (Exception $e) {
    die("Cannot insert data: " . $e->getMessage());
}
