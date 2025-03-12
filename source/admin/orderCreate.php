<!-- import header here -->
<?php
include("adminCheckpoint.php");
include("head.php");
include("connect.php");
include("data.php");
?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php
    include("spinner.php");
    ?>
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
                            Create Order Records</h6>
                        <form method="post" action="orderInsert.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="order_id" class="form-label">Record ID</label>
                                <input required type="number" name="rId" class="form-control" id="order_id"
                                    aria-describedby="product_id" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="product_id" class="form-label">Product ID</label>
                                <input required type="number" name="pId" class="form-control" id="product_id">
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">user ID</label>
                                <input required type="number" name="uId" class="form-control" id="user_id">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input required type="text" name="date" class="form-control" id="dateRecord">
                            </div>

                            <div class="mb-3">
                                <label for="orderAmount" class="form-label">Ordered Amount</label>
                                <input required="number" name="orderAmo" class="form-control" id="orderAmount">
                            </div>
                            <div class="mb-3">
                                <label for="shoe_size" class="form-label">Shoe Size</label>
                                <select id="shoe_size" name="shoeSize" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="40" selected>Choose a Shoe Size</option>
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
                                <input required type="number" name="tCost" class="form-control" id="total_cost">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Deliver Address</label>
                                <input required type="text" name="address" class="form-control" id="address">
                            </div>

                            <div class="mb-3">
                                <label for="phoneNum" class="form-label">Phone Number</label>
                                <input required type="text" name="pNum" class="form-control" id="phoneNum">
                            </div>

                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Payment Method</label>
                                <select id="paymentMethod" name="paymentMethod" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Cash On Delivery" selected>Cash On Delivery</option>
                                    <option value="Online Payment">Online Paymemnt</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="paymentStatus" class="form-label">Payment Status</label>
                                <select id="paymentStatus" name="paymentStatus" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Paid" selected>Paid</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="deliveredStatus" class="form-label">Delivery Status</label>
                                <select id="deliveredStatus" name="deliveredStatus" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="1" selected>Delivered</option>
                                    <option value="0">Not Delivered</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.querySelector("#dateRecord").addEventListener("change", function() {
            console.log(this.value); // Logs the selected date in the format "Y-m-d"
        });

        flatpickr("#dateRecord", {
            dateFormat: "Y-m-d",
        });
    </script>
    <?php include("jslibs.php");  ?>

</div>