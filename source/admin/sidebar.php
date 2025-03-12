<div class="sidebar pe-4 pb-3 bg-custom-gradient overflow-x-hidden">
    <nav class="navbar bg-transparent w-i box-border">
        <a href="#" class="w-[80%] flex justify-center navbar-brand mx-4 mb-1 ">
            <img class="block w-[80px] h-[80px]" src="../../images/logo2white.png" alt="">
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <!-- <img class="rounded-circle" src="" alt="" style="width: 40px; height: 40px;"> -->
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white"><?= $_SESSION['username'] ?></h6>
                <span class="text-white-50">Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100" id="nav_bar_items">
            <a href="index.php" class="nav-item nav-link active"><i class="fa-solid fa-gauge me-3"></i>
                <span class="text-white">Dashboard</span>
            </a>
            <a href="product_create.php" class="nav-item nav-link"><i class="fa-solid fa-plus me-3"></i>
                <span class="text-white">ADD Products</span>
            </a>
            <a href="product_table.php" class="nav-item nav-link"><i class="fa-solid fa-table me-3"></i>
                <span class="text-white"> Product
                    Tables </span>
            </a>
            <a href="user_create.php" class="nav-item nav-link"><i class="fa-solid fa-user-plus me-3"></i>
                <span class="text-white">ADD Users</span>
            </a>
            <a href="user_table.php" class="nav-item nav-link"><i class="fa-solid fa-users me-3"></i>
                <span class="text-white">Users Tables</span>
            </a>
            <a href="orderCreate.php" class="nav-item nav-link"><i class="fa-solid fa-file-pen me-3"></i>
                <span class="text-white"> Add Orders</span>
            </a>
            <a href="orderTable.php" class="nav-item nav-link"><i class="fa-solid fa-book me-3"></i>
                <span class="text-white">Orders Table</span>
            </a>
        </div>
    </nav>
</div>