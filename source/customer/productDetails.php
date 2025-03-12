<!-- Login Handle -->
<?php
include("login_handle.php");
$id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="en" class="font-serif">


<head>
    <title>Index</title>
</head>
<?php include("head_data.php") ?>

<body>
    <!-- Login component -->
    <?php include("login_component.php") ?>
    <!--Entire WEB page-->
    <div id="home_page_div" class="homeMenuBackground ">
        <!--Nav Section-->
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
                            <a href="index.php"
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
        </nav> <!-- Items -->

        <div class="box-border mb-[10px] p-5 w-full h-fit flex flex-col justify-center items-center" id="item_display">
            <!-- Ecommerce cards -->
            <!-- Get Products -->
            <?php include("data.php") ?>
            <?php $product = getSpecificProduct($pdo, $id); ?>
            <?php $feedbacks = getFeedbackWithUserAndProduct($pdo, $id); ?>
            <div class="grid grid-cols-1 gap-4 place-items-center w-full lg:w-[80%]">
                <div id="<?= $product['ID'] ?>"
                    class="w-full bg-white flex flex-col md:flex-row lg:flex-row justify-center items-center border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <!-- Image -->
                    <img class="zoom lora-font p-8 rounded-t-lg w-full lg:w-1/2 h-[500px] object-contain rounded-lg"
                        src="<?= $product['Image'] ?>" alt="product image" />
                    <div class="px-5 pb-5">
                        <!-- Name -->
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                <?= $product["Name"] ?></h5>
                        </a>
                        <!-- Stars -->
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <?php for ($star = 0; $star < $product['Rating']; $star++): ?>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                <?php endfor ?>
                            </div>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?= $product["Rating"]; ?></span>
                        </div>
                        <!-- Description -->
                        <p>
                            <?= $product['Description'] ?>
                        </p>
                        <!-- Size -->
                        <div class="max-w-sm mx-auto w-full">
                            <label for="underline_select" class="sr-only">Shoe Size</label>
                            <select id="underline_select"
                                class="block box-border p-5 w-inherit text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
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


                        <!--  -->
                        <div class="box-border mt-[10px] flex items-center justify-between ">
                            <span
                                class="text-3xl font-bold text-gray-900 dark:text-white">$<?= $product["Price"] ?></span>

                            <form class="add-to-cart-form" method="post">
                                <input type="hidden" name="id" value="<?= $product['ID'] ?>">
                                <button type="button" data-id="<?= $product['ID'] ?>"
                                    price-tag="<?= $product["Price"] ?>"
                                    class="add-to-cart-btn text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-full lg:w-[80%] h-[300px] mx-auto p-6 bg-gray-100 shadow-lg rounded-lg mt-5 flex flex-col gap-5">
                <div class="w-full lg:w-[100%] h-[250px] overflow-y-scroll mx-auto p-4 rounded-lg mt-1 scrollbar-none">
                    <h1 class="box-border w-full h-fit p-1 text-center mb-5 lora-font text-lg rounded-lg bg-gray-200">
                        Feedbacks Section</h1>
                    <?php foreach ($feedbacks as $feedback): ?>
                        <div class="h-fit space-y-4 mb-[10px]">
                            <div class="max-w-xl lg:max-w-3xl mx-auto p-4 bg-white shadow-md rounded-lg">
                                <!-- User info section -->
                                <div class="flex items-center mb-3">
                                    <img src="../../images/login.jfif" alt="User Icon"
                                        class="w-10 h-10 rounded-full border border-gray-300" />
                                    <div class="ml-3">
                                        <p class="font-semibold text-gray-800"><?php print_r($feedback["user_name"]) ?></p>
                                        <div class="flex items-center">
                                            <!-- Star Rating -->
                                            <div class="flex text-yellow-500">
                                                <?php for ($star = 0; $star < $feedback["rating"]; $star++): ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 .587l3.668 7.431 8.167 1.174-5.917 5.796 1.396 8.145-7.314-3.849-7.314 3.849 1.396-8.145-5.917-5.796 8.167-1.174z" />
                                                    </svg>
                                                <?php endfor ?>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-500">(<?= $feedback["rating"] ?>/5)</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Feedback text -->
                                <p class="text-gray-700 text-sm">
                                    <?= $feedback["feedback_text"] ?>
                                </p>
                            </div>
                            <!-- Additional feedback cards go here -->
                        </div>
                    <?php endforeach ?>
                </div>

                <!-- Feedback submission section -->
                <div class="flex items-center space-x-4">
                    <form class="w-full flex items-center space-x-4" action=" feedbacksHandle.php" method="post">
                        <input type="hidden" name="product_id" value="<?= $id; ?>">
                        <!-- Text input -->
                        <input type="text" name="feedback_text" placeholder="Write your feedback..."
                            class="flex-1 p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
                        <!-- Rating -->
                        <select name="feedback_rating"
                            class="p-2 border rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="5">5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>
                        </select>
                        <!-- Submit button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Submit
                        </button>
                    </form>
                </div>
            </div>


            <!-- Shopping Chart -->
            <?php include("cartBox.php") ?>


        </div>

        <script type="module" src="js/add_to_cart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/medium-zoom/dist/medium-zoom.min.js"></script>
        <script>
            const zoomInstance = mediumZoom('.zoom', {
                margin: 24,
                scrollOffset: 0,
                background: 'rgba(0, 0, 0, 0.9)',
            });

            let zoomLevel = 1;

            // Override the default zoom action to allow zooming further on each click
            document.querySelectorAll('.zoom').forEach((img) => {
                img.addEventListener('click', function() {
                    zoomLevel += 1; // Increase zoom level on each click
                    zoomInstance.update({
                        scale: zoomLevel, // Apply the new zoom scale
                    });
                });
            });
        </script>


</body>

</html>