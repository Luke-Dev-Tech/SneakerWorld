<!-- import header here -->
<?php
include("adminCheckpoint.php");
include("head.php");
include("connect.php");
include("data.php");
$id = $_GET['id'];
$order = getSpecificOrder($pdo, $id);
?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <!-- import spinner here -->
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <!-- import sidebar here -->
    <?php
    include("sidebar.php");
    ?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <!-- import navbar here -->
        <?php
        include("navbar.php");
        ?>
        <!-- Navbar End -->

        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12 px-lg-5">
                    <div class="bg-light rounded h-100 p-4">
                        <h6
                            class="rounded-lg box-border p-2 bg-gray-200 flex justify-center items-center w-full text-center text-3xl mb-4 bebas-neue-regular">
                            Edit Order Records</h6>
                        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="order_id" class="form-label">Record ID</label>
                                <input type="number" name="rId" class="form-control" id="order_id"
                                    aria-describedby="product_id" value="<?= $order['recordID'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="product_id" class="form-label">Product ID</label>
                                <input type="text" name="pId" class="form-control" id="product_id"
                                    value="<?= $order['productID'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">user ID</label>
                                <input type="text" name="uId" class="form-control" id="user_id"
                                    value="<?= $order['userID'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input required type="text" name="date" class="form-control" id="dateRecord"
                                    value="<?= $order['recordDate'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="orderAmount" class="form-label">Ordered Amount</label>
                                <input type="number" name="orderAmo" class="form-control" id="orderAmount"
                                    value="<?= $order['orderAmount'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="shoe_size" class="form-label">Shoe Size</label>
                                <select id="shoe_size" name="shoeSize" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected><?= $order['shoeSize'] ?></option>
                                    <option value="36">EU-36 : Small</option>
                                    <option value="38">EU-38 : Medium-small </option>
                                    <option value="40">EU-40 : Medium</option>
                                    <option value="42">EU-42 : Medium-large</option>
                                    <option value="44">EU-44 : Large</option>
                                    <option value="46">EU-46 : Extra-large</option>
                                    <option value="48">EU-48 : Extra-extra-large</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="total_cost" class="form-label">Total Cost</label>
                                <input type="number" name="tCost" class="form-control" id="total_cost"
                                    value="<?= $order['totalCost'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Deliver Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="<?= $order['address'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="phoneNum" class="form-label">Phone Number</label>
                                <input type="text" name="pNum" class="form-control" id="phoneNum"
                                    value="<?= $order['phoneNum'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Payment Method</label>
                                <select id="paymentMethod" name="paymentMethod" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php if ($order['paymentMethod'] == "Cash On Delivery"): ?>
                                        <option value="Cash On Delivery" selected>Cash On Delivery</option>
                                        <option value="Online Payment">Online Paymemnt</option>
                                    <?php else: ?>
                                        <option value="Cash On Delivery">Cash On Delivery</option>
                                        <option value="Online Payment" selected>Online Paymemnt</option>
                                    <?php endif ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="paymentStatus" class="form-label">Payment Status</label>
                                <select id="paymentStatus" name="paymentStatus" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php if ($order['paymentStatus'] == "Paid"): ?>
                                        <option value="Paid" selected>Paid</option>
                                        <option value="Pending">Pending</option>
                                    <?php else: ?>
                                        <option value="Paid">Paid</option>
                                        <option value="Pending" selected>Pending</option>
                                    <?php endif ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="deliveredStatus" class="form-label">Delivery Status</label>
                                <select id="deliveredStatus" name="deliveredStatus" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php if ($order['deliveredStatus'] == 1): ?>
                                        <option value="1" selected>Delivered</option>
                                        <option value="0">Not Delivered</option>
                                    <?php else: ?>
                                        <option value="1">Delivered</option>
                                        <option value="0" selected>Not Delivered</option>
                                    <?php endif ?>

                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
        <?php
        if (isset($_POST['submit'])) {
            try {
                // Ensure $_GET['id'] is set and valid
                $record_id = $_GET['id'];
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

                // Prepare SQL query for updating the record
                $sql = "UPDATE order_records SET 
            product_id = :pid,
            user_id = :uid,
            record_date = :rdate,
            ordered_amount = :orderedAmount,
            total_cost = :totalCost,
            address = :address,
            phone_num = :phoneNum,
            shoe_size = :shoeSize,
            payment_method = :paymentMethod, 
            payment_status = :paymentStatus, 
            delivered_status = :deliveredStatus
            WHERE record_id = :rid";

                // Prepare and bind the statement
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':rid', $record_id);
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

                // Execute the statement
                $stmt->execute();

                // Redirect to orderTable.php
                echo "<script> window.location.href = 'orderTable.php'; </script>";
            } catch (Exception $e) {
                echo "Error updating order: " . $e->getMessage();
            }
        }
        ?>



        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Sneakers World</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.querySelector("#dateRecord").addEventListener("change", function() {
            console.log(this.value); // Logs the selected date in the format "Y-m-d"
        });

        flatpickr("#dateRecord", {
            dateFormat: "Y-m-d",
        });
    </script>
    <!-- JavaScript Libraries -->
    <?php include("jslibs.php");  ?>

</div>