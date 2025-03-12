<!-- Login Handle -->
<?php
include("login_handle.php")
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
    <div id="home_page_div" class="homeMenuBackground">
        <!--Nav Section-->
        <?php include("nav.php") ?>

        <!-- Home-Page Start -->
        <div class="relative parallax flex justify-center items-center">
            <div class="block w-full h-[55vh] bg-black bg-opacity-20 text-center flex flex-col justify-center gap-[30px] items-center text-white"
                id="parallax_id">
            </div>
            <div id="exploreNow"
                class="select-none cursor-pointer expandable-box bg-gradient-to-r from-indigo-500 to-violet-500 absolute block bottom-[20px] w-fit rounded-full w-[50px] h-[50px] z-50 animate-bounce group hover:w-[200px] flex flex-row items-center transition-all duration-300">
                <i class="w-[50px] h-[50px] inline-flex items-center justify-center fa-solid fa-arrow-down"
                    style="color: white;"></i>
                <span class="text-white ml-2 hidden group-hover:inline-block">ExploreNow</span>
            </div>
        </div>

        <!-- Image gallery -->
        <div id="gallery" class="w-full h-[20vh] relative bg-gradient-to-b from-gray-100 to-gray-300 ..."
            data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[20vh] overflow-hidden rounded-lg">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../images/adidas.png"
                        class="absolute block max-w-full h-[20vh] object-contain -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="../../images/nike.png"
                        class="absolute block max-w-full h-[20vh] object-contain -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../images/newbalance.png"
                        class="absolute block max-w-full h-[20vh] object-contain -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../images/jordan.png"
                        class="absolute block max-w-full h-[20vh] object-contain -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../images/puma.png"
                        class="absolute block max-w-full h-[20vh] object-contain -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
            </div>
        </div>
        <!-- Items -->

        <div class="box-border mb-[10px] p-5 w-full h-fit" id="item_display">
            <div class=" flex items-center justify-center py-4 md:py-8 flex-wrap" id="filter_buttons">
                <button id="All" type="button"
                    class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">All
                    categories</button>
                <button id="Men" type="button"
                    class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Men's
                    Wear</button>
                <button id="Women" type="button"
                    class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Women's
                    Wear</button>
                <button id="Casual" type="button"
                    class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Casual</button>
                <button id="Sport" type="button"
                    class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Sport</button>
            </div>

            <!-- Ecommerce cards -->
            <!-- Get Products -->
            <div id="product-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 place-items-center">
                <!-- Dynamic products will be inserted here -->
            </div>
        </div>

        <!-- ChatBot -->
        <?php include("chatbot.php") ?>

        <!-- Shopping Chart -->
        <?php include("cartBox.php") ?>

        <!-- Footer Section -->
        <?php include("footer.php") ?>
    </div>

    </div>
    <script type="module">
        import sweetalert2 from 'https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/+esm'
    </script>


    <script src="js/windowSizeCheck.js"></script>
    <script type="module" src="js/home.js"></script>
    <script src="js/chatbot.js"></script>
</body>

</html>