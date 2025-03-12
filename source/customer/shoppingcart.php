<?php
include("cart_api.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("head_data.php") ?>

</head>

<body>
    <!-- Nav -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../../images/logo.png" class=" w-20 h-20" alt="Flowbite Logo" />
                <span
                    class="self-center pacifico-regular text-2xl lg:text-4xl font-semibold whitespace-nowrap dark:text-white">Sneakers
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
    <!-- Slogan -->
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white w-full block">
            Ready to Rock? <span class="text-blue-600 dark:text-blue-500">Secure Your Style</span> Before It’s Gone!
        </h1>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Great Choice! Finish Up to Have These
            Sneakers on Your Doorstep Soon!</p>
    </div>
    <!-- cart display -->
    <div class="relative overflow-x-auto mx-auto p-4 w-full box-border mb-2">
        <table class=" min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">Product Image</th>
                    <th scope="col" class="px-6 py-3 text-center">Product Name</th>
                    <th scope="col" class="px-6 py-3 text-center">Brand</th>
                    <th scope="col" class="px-6 py-3 text-center">Size</th>
                    <th scope="col" class="px-6 py-3 text-center">Amount</th>
                    <th scope="col" class="px-6 py-3 text-center">Price</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                // In session there is no elements except the IDs. [0] => 1
                if (isset($_SESSION['cartItemsId']) && count($_SESSION['cartItemsId']) > 0):
                    $cart_items_json = json_encode($_SESSION['cartItemsId']); // this
                    foreach ($_SESSION['cartItemsId'] as $cart_item_id):
                        $product_data = getSpecificProduct($pdo, $cart_item_id['id']);
                ?>
                        <tr class="shoeRecord bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="<?= $index ?>">
                            <td
                                class="px-6 py-4 whitespace-nowrap dark:text-white text-center flex justify-center items-center">
                                <img src="<?= $product_data['Image']; ?>" alt="" class="w-[100px] h-[100px]">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-white text-center">
                                <?= $product_data['Name']; ?>
                            </td>
                            <td class="px-6 py-4 dark:text-white text-center">
                                <?= $product_data['Brand']; ?>
                            </td>
                            <td class="px-6 py-4 dark:text-white text-center">
                                <?= $cart_item_id['shoeSize']; ?>
                            </td>
                            <td class="px-6 py-4 dark:text-white text-center">
                                <div class="relative w-full flex justify-center items-center">
                                    <button type="button" id="decrement-button" data-input-counter-decrement="counter-input"
                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="counter-input" data-input-counter
                                        class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                        placeholder="" value="1" required />
                                    <button type="button" id="increment-button" data-input-counter-increment="counter-input"
                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td class="px-6 py-4 dark:text-white text-center" id="product_price"></td>
                            <td class="px-6 py-4 dark:text-white text-center">
                                <!-- Delete Item from cart -->
                                <i class="fa-solid fa-trash" id="delete_item_from_cart" style="cursor:pointer;"></i>

                            </td>
                        </tr>
                    <?php
                        $index++;
                    endforeach;
                else:
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="5" class="px-6 py-4 text-center dark:text-white">No items in the cart.</td>
                    </tr>
                <?php
                endif;
                ?>
                <!-- Total Cost Section -->
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="3" class="px-6 py-4 text-center dark:text-white">All Items Total Price</td>
                    <td class="px-6 py-4 text-center dark:text-white font-bold" colspan="2" id="total_cost"></td>
                    <!-- Format total cost -->
                </tr>
            </tbody>
        </table>
    </div>
    <div class="max-w-screen-xl box-border w-full h-fit flex justify-end items-center mx-auto p-4 gap-5">
        <a href="index.php"
            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
            aria-current="page">Go Back to Home Page</a>
        <form id="checkout-form">
            <!-- Total cost is calcualted here -->
            <input type="hidden" name="totalcost" id="total_cost_checkout" value="">
            <button type="submit"
                class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                onclick="">CheckOut</button>
        </form>
    </div>

    <!-- Javascript -->
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script>
        // Attribute
        let cartItems = <?= $cart_items_json; ?>;
        // Checkout Request
        document.getElementById("checkout-form").addEventListener("submit", async function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the total cost and cart items
            const totalCost = document.getElementById("total_cost_checkout").value;

            // Assume `cartItems` is defined and contains the correct structure
            const payload = {
                totalcost: totalCost,
                cartItems: cartItems
            };

            try {
                console.log("Payload:", JSON.stringify(payload));

                const response = await fetch("checkout.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(payload),
                });

                if (response.ok) {
                    const data = await response.json();
                    console.log("Response Data:", data);

                    if (data.success && data.loggedIn) {
                        console.log("Checkout successful!");
                        window.location.href = "checkout.php";
                    } else if (!data.loggedIn) {
                        window.location.href = "login.php";
                    } else {
                        console.error("Error from server:", data.message || "Unknown error.");
                    }
                } else {
                    console.error("HTTP Error:", response.statusText);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        });


        // Delete Section
        document.querySelectorAll("#delete_item_from_cart").forEach(delete_button => {
            delete_button.addEventListener("click", function(event) {
                event.preventDefault();
                // Get the input element associated with this button
                const div_id_to_delete = event.target.closest('tr').id;
                console.log(div_id_to_delete);
                // Send request to remove item from the session
                fetch('remove_from_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: div_id_to_delete
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('total_cost').innerText = data
                                .newTotal; // Update total cost
                            document.getElementById('total_cost_checkout').value = data.newTotal;
                            location.reload();
                        } else {
                            console.error('Failed to remove item');
                        }
                    })
            });
        });

        // Displaying PriceTag Initally 
        let records = document.querySelectorAll(".shoeRecord");
        records.forEach(record => {
            console.log(record);
            let priceTag = record.querySelector("#product_price"); // Note
            let amountTag = record.querySelector("#counter-input");

            priceTag.innerText = cartItems[record.id].priceTag;
            amountTag.value = cartItems[record.id].amount;
        });

        // Increment and Decrement Buttons
        document.addEventListener("click", function(event) {
            // Check if the clicked element is an increment or decrement button
            const incrementButton = event.target.closest("#increment-button");
            const decrementButton = event.target.closest("#decrement-button");

            if (incrementButton || decrementButton) {
                // Get the closest <tr> element to the clicked button
                const trElement = event.target.closest("tr");

                if (trElement) {
                    // Fetch the ID of the <tr>
                    const trId = trElement.id;

                    if (incrementButton) {
                        trElement.querySelector("#counter-input").value++;
                        cartItems[trId].amount++;
                    }

                    if (decrementButton && trElement.querySelector("#counter-input").value > 1) {
                        trElement.querySelector("#counter-input").value--;
                        cartItems[trId].amount--;

                    }
                }
                console.log(cartItems);
                updateTotalCost();
            }
        });

        // Total Cost Display 
        let totalCost = 0;

        function updateTotalCost() {
            totalCost = cartItems.reduce((total, item) => {
                const productData = item; // loading each product data from PHP or JS object
                return total + (productData.priceTag * productData.amount);
            }, 0);
            document.getElementById("total_cost").innerText = totalCost.toFixed(2);
            document.getElementById("total_cost_checkout").value = totalCost.toFixed(2);
        }



        updateTotalCost(); // Calling for inital.
    </script>
    <script type="module" src="js/amount_adjust.js"></script>



</body>

</html>