<!-- import header here -->
<?php
include("head.php");
include("adminCheckpoint.php");
include("connect.php");
include("data.php");
?>
<div class="container-xxl position-relative bg-white d-flex p-0">

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
        <?php include("navbar.php"); ?>
        <!-- Navbar End -->

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <?php $stats = getOrderStats($pdo); ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-2 gap-4">
                <div
                    class="h-[250px] bg-slate-100 rounded-lg p-6 flex items-center justify-between hover:shadow-2xl transition-shadow duration-300">
                    <img class="w-1/2 lg:w-[250px] rounded-lg" src="../../images/sales.gif" alt="">
                    <div class="flex flex-col items-center ml-4">
                        <p class="text-md text-gray-500 lora-font">Total Sales of Sneakers</p>
                        <h6
                            class="bg-slate-400 box-border p-2 text-white rounded-lg w-[100px] h-fit text-md font-bold text-center bebas-neue-regula">
                            <?= $stats['total_sales'] ?></h6>
                    </div>
                </div>
                <div
                    class="h-[250px] bg-slate-100 rounded-lg p-6 flex items-center justify-between hover:shadow-2xl transition-shadow duration-300">
                    <img class="w-1/2 lg:w-[250px] rounded-lg" src="../../images/calculator.gif" alt="">
                    <div class="w-1/2 flex flex-col items-center ml-4">
                        <p class="text-md text-gray-500 lora-font">Total Revenue</p>
                        <h6
                            class="bg-slate-400 box-border p-2 text-white rounded-lg w-[100px] h-fit text-md font-bold text-center bebas-neue-regula">
                            <?= "$" . $stats['total_revenue'] ?>
                        </h6>
                    </div>
                </div>
                <div
                    class="h-[250px] bg-slate-100 rounded-lg p-6 flex items-center justify-between hover:shadow-2xl transition-shadow duration-300">
                    <img class="w-1/2 lg:w-[250px] rounded-lg" src="../../images/analyze.gif" alt="">
                    <div class="w-1/2 flex flex-col items-center ml-4">
                        <p class="text-md text-gray-500 lora-font">Total Orders</p>
                        <h6
                            class="bg-slate-400 box-border p-2 text-white rounded-lg w-[100px] h-fit text-md font-bold text-center bebas-neue-regula">
                            <?= $stats['total_orders'] ?>
                        </h6>
                    </div>
                </div>
                <div
                    class="h-[250px] bg-slate-100 rounded-lg p-6 flex items-center justify-between hover:shadow-2xl transition-shadow duration-300">
                    <img class="w-1/2 lg:w-[250px] rounded-lg" src="../../images/pending.gif" alt="">
                    <div class="w-1/2 flex flex-col items-center ml-4">
                        <p class="text-md text-gray-500 lora-font">Pending Orders Records</p>
                        <h6
                            class="bg-slate-400 box-border p-2 text-white rounded-lg w-[100px] h-fit text-md font-bold text-center bebas-neue-regula">
                            <?= $stats['pending_orders'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->
</div>

<!-- JavaScript Libraries -->
<?php include("jslibs.php");  ?>