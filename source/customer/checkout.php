<?php
session_start();
include("connect_database.php");
include("data.php");

$total_cost = 0;
// If the user is not logged in, suggest him to login
if ($_SESSION['loggedIn'] == 0) {
    echo json_encode(["success" => false, "loggedIn" => false, "message" => "Not LoggedIn"]);
    exit();
}

// Checking total value existance. 
if ($_SERVER['REQUEST_METHOD'] == "POST" and $_SESSION['loggedIn'] == 1) {
    $jsonData = file_get_contents("php://input");

    if ($jsonData) {
        // Decode the JSON data into a PHP array (true for associative array)
        $data = json_decode($jsonData, true);
        $_SESSION["cartItemsId"] = $data["cartItems"];
        echo json_encode(["success" => true, "loggedIn" => true]);
        exit();
    } else {
        echo json_encode(["success" => false, "loggedIn" => true, "message" => "Product ID missing."]);
        exit();
    }
}
?>


<DOCTYPE html>
    <html lang="en">

    <head>
        <?php include("head_data.php") ?>
        <title>Document</title>
    </head>

    <body>
        <!-- Nav -->
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="../../images/logo.png" class="w-20 h-20" alt="Flowbite Logo" />
                    <span
                        class="self-center pacifico-regular text-4xl font-semibold whitespace-nowrap dark:text-white">Sneakers
                        World</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <form class="max-w-sm mx-auto box-border bg-slate-100	 p-8 rounded-lg" action="checkoutHandle.php"
            method="post">
            <h1 class="w-full text-center text-3xl pacifico-regular">Check Out</h1>
            <div class="flex flex-col justify-start items-start mb-5">
                <p class="text-sm font-medium text-gray-900">Items</p>
                <span>
                    <?php
                    try {
                        if (isset($_SESSION['cartItemsId'])):
                            foreach ($_SESSION['cartItemsId'] as $product_id):
                    ?>
                                <span>
                                    <?php
                                    // Assuming $getSpecificProduct is a function that fetches product details
                                    $product = getSpecificProduct($pdo, $product_id["id"]);
                                    if ($product):
                                    ?>
                                        <?= htmlspecialchars($product['Name'] . " (Size - EU " . $product_id['shoeSize'] . ") x " . $product_id['amount'] ?? 'Product name not found'); ?>
                                        <br>
                                    <?php else: ?>
                                        <span>Product not found</span>
                                    <?php endif; ?>
                                </span>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <span>No items in the cart</span>
                    <?php
                        endif;
                    } catch (Exception $e) {
                        echo "<span>Error: " . $e->getMessage() . "</span>";
                    }
                    ?>
                </span>
            </div>


            <div class="flex justify-between items-center mb-5">
                <p class="text-sm font-medium text-gray-900">Total Item : </p>
                <span>
                    <?php
                    try {
                        if (isset($_SESSION['cartItemsId'])): ?>
                            <span><?php
                                    $total_items = 0;
                                    foreach ($_SESSION['cartItemsId'] as $product) {
                                        $total_items += $product['amount'];
                                    }
                                    echo $total_items;
                                    ?></span>
                        <?php else: ?>
                            <span>0</span>
                    <?php endif;
                    } catch (Exception $e) {
                        echo "<span>Error: " . $e->getMessage() . "</span>";
                    }
                    ?>
                </span>
            </div>

            <div class="flex justify-between items-center mb-5">
                <p class="text-sm font-medium text-gray-900">Total Cost : </p>
                <span>
                    <?php
                    $total_cost = 0;
                    foreach ($_SESSION["cartItemsId"] as $record) {
                        $total_cost += $record["amount"] * $record["priceTag"];
                    }

                    ?>
                    <input type="hidden" value="<?= htmlspecialchars($total_cost); ?>">
                    <span><?= htmlspecialchars($total_cost); ?></span>
                </span>
            </div>

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                    Name</label>
                <input type="text" id="name"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="John Doe" required value="<?= $_SESSION['username'] ?>" />
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    email</label>
                <input type="email" id="email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="name@gmail.com" required value="<?= $_SESSION['userEmail'] ?>" />
            </div>

            <div class="mb-5">
                <label for="phoneNum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Phone Number to connect</label>
                <input type="text" id="phoneNum" name="phoneNum"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="09123456789" required />
            </div>

            <div class="mb-5">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Address</label>
                <textarea type="text" id="address" name="address"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required></textarea>
            </div>

            <div class="mb-5">
                <label for="payment_methods"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Plans</label>
                <select id="payment_methods" name="payment"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="Cash On Delivery" selected>Cash On Delivery</option>
                    <option value="Online Payment">Online Payments</option>
                </select>
            </div>

            <div class="hidden mb-5" id="online_payments">
                <label for="payments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Online
                    Payments</label>
                <div class="flex items-center">
                    <input checked id="default-radio-2" type="radio" value="NEXT" name="online_payment_radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Krung
                        Thai Bank</label>
                </div>
                <div class="flex items-center mb-4" id="payments">
                    <input id="default-radio-1" type="radio" value="KBZ" name="online_payment_radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">KBZ
                        Pay</label>
                </div>
                <div class="flex justify-center items-center" id="qr_div">
                    <img class="rounded-lg w-[80%] shadow-md" src="../../images/onlinePayments/KT.jpg" alt="Hidden"
                        id="qr_img">
                </div>
            </div>

            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                        required />
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a
                        href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                        conditions</a></label>
            </div>

            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Purchase</button>
        </form>
        <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
        <script>
            let onlinePaymentDiv = document.getElementById("online_payments");
            let qr_img = document.getElementById("qr_img");

            document.getElementById("payment_methods").addEventListener("change", (event) => {
                console.log(event.target.value);
                if (event.target.value == "Cash On Delivery") {
                    onlinePaymentDiv.classList.add("hidden");
                    qr_img.classList.add("hidden");
                } else {
                    onlinePaymentDiv.classList.remove("hidden");
                    qr_img.classList.remove("hidden");
                }
            })

            // Select all radio buttons with the name "online_payment_radio"
            const paymentRadios = document.querySelectorAll(
                'input[name="online_payment_radio"]'
            );
            paymentRadios.forEach((radio) => {
                radio.addEventListener("change", (event) => {
                    if (event.target.checked) {
                        const selectedValue = event.target.value;

                        let imgSrc = "";
                        if (selectedValue === "KBZ") {
                            imgSrc = "../../images/onlinePayments/KBZ.jpg";
                            console.log("KBZ");
                        } else if (selectedValue === "NEXT") {
                            imgSrc =
                                imgSrc = "../../images/onlinePayments/KT.jpg";
                            console.log("NEXT");
                        }
                        qr_img.src = imgSrc;
                    }
                });
            });
            // ---------------------------------
        </script>
    </body>

    </html>