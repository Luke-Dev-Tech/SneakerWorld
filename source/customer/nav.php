<div id="header_nav_section" class="home_nav bg-gradient-to-r from-blue-500 to-purple-600">
    <div class=" home_nav_upper ">
        <div id=" logo" class="logo_img text-white">
            <img src="../../images/whitelogo.png" alt="logo" class="w-[80px] h-[80px]">
            <h1 class="bebas-neue-regular text-2xl">Sneakers World</h1>
        </div>
        <nav class="box-border flex justify-end items-center gap-[10px]">
            <lord-icon class="nav_item" src="https://cdn.lordicon.com/jeuxydnh.json" trigger="hover"
                colors="primary:cyan,secondary:cyan">
            </lord-icon>
            <a href="#"
                class="box-border w-[68px] h-[70%] text-white flex justify-center items-center hover:bg-black hover:bg-opacity-50 hover:rounded-lg transition duration-300 ease-in-out">
                Home </a>

            <lord-icon class="nav_item" src="https://cdn.lordicon.com/ogjpwrxe.json" trigger="hover"
                colors="primary:cyan,secondary:cyan">
            </lord-icon>
            <a href="About_us.php"
                class="box-border w-[68px] h-[70%] text-white flex justify-center items-center hover:bg-black hover:bg-opacity-50 hover:rounded-lg transition duration-300 ease-in-out">
                About </a>

            <lord-icon class="nav_item" src="https://cdn.lordicon.com/fjvfsqea.json" trigger="hover"
                colors="primary:cyan,secondary:cyan">
            </lord-icon>
            <a id="service_btn"
                class="box-border w-[68px] h-[70%] text-white flex justify-center items-center hover:bg-black hover:bg-opacity-50 hover:rounded-lg transition duration-300 ease-in-out">
                Services </a>

            <lord-icon class="nav_item" src="https://cdn.lordicon.com/kdduutaw.json" trigger="hover"
                colors="primary:cyan,secondary:cyan">
            </lord-icon>
            <a href="contact.php"
                class="box-border w-[68px] h-[70%] text-white flex justify-center items-center hover:bg-black hover:bg-opacity-50 hover:rounded-lg transition duration-300 ease-in-out">
                Contact </a>
        </nav>


        <!-- login-section -->
        <div id="login_logout_section" class="login_logout_section">
            <!-- nav-tab-mobile -->
            <?php include("nav_tab_mobile.php") ?>
            <!--button effect-->
            <div class="search-box flex justify-center items-center transition ease-in-out delay-150 hover:bg-cyan-800 duration-300"
                title="Search" id="searchingDiv">
                <button class="btn-search flex justify-center items-center">
                    <lord-icon src="https://cdn.lordicon.com/wjyqkiew.json" trigger="hover" class="search_btn_icon"
                        colors="primary:white,secondary:white">
                    </lord-icon>
                </button>
                <input type="text" class="input-search" placeholder="Type to Search...">
            </div>
            <?php if ($_SESSION['loggedIn'] == 0): ?>
                <button class=" w-fit h-4/5 text-white rounded-lg hover:bg-cyan-700" id="call_login_button" title="Login">
                    <lord-icon src="https://cdn.lordicon.com/kdduutaw.json" trigger="hover"
                        colors="primary:#ffffff,secondary:#ffffff" style="width:50px;height:50px">
                    </lord-icon>
                </button>
            <?php else: ?>
                <div class="loggedIn-box box-border flex justify-center items-center transition ease-in-out">
                    <lord-icon src="https://cdn.lordicon.com/kdduutaw.json" trigger="hover" state="hover-looking-around"
                        colors="primary:#ffffff,secondary:#ffffff" style="width:45px;height:45px">
                    </lord-icon>
                    <h4 class="text-base text-white">
                        Hello,
                        <?php echo $_SESSION['username'] ?>
                    </h4>

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-transparent focus:outline-none font-medium rounded-lg text-sm p-5 text-center inline-flex items-center"
                        type="button"> <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-fit box-border p-[10px] dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <!-- Add more if you want -->
                            <li>
                                <a href="logout.php" class="dropdown-item" id="logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
    <!--Lower nav item-->
    <div class="nav_items" id="nav_items">
        <a href="#" name="shopAll" id="shopAll">
            Shop All
        </a>
        <div class="box-border text-white h-full rounded-lg flex justify-center items-center hover:bg-black hover:bg-opacity-50 transition duration-300 ease-in-out"
            id="nav_items_indicators">
            <a href="#" name="brands" id="dropdownindicators">
                Brands
            </a>
        </div>

        <div class="box-border text-white h-full rounded-lg flex justify-center items-center hover:bg-black hover:bg-opacity-50 transition duration-300 ease-in-out"
            id="nav_items_indicators">
            <a href="#" name="sale">
                Sale
            </a>
        </div>

        <div class="box-border text-white h-full rounded-lg flex justify-center items-center hover:bg-black hover:bg-opacity-50 transition duration-300 ease-in-out"
            id="nav_items_indicators">
            <a href="#" name="trending">
                Trending
            </a>
        </div>
        <div class="box-border nav_items_describe_div w-[85%] h-[360px] p-[10px] bg-gray-200"
            id="nav_items_describe_div">
            <div class='w-full h-[350px]  flex flex-col justify-center items-center'>
                <h1 class='rounded-lg w-full box-border p-[5px] m-0 text-xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 text-white text-center'
                    id="dropdown_header">
                </h1>
                <div class='box-border w-full h-full flex justify-around items-start mt-[10px]'>
                    <div class="w-[100%] md:w-[40%] lg:w-[40%] h-[250px] box-border" id="dropdown_item_firstbox">
                        <!-- Content for the first box -->
                    </div>
                    <div class="hidden shadow-lg shadow-black-500/50 w-1/2 h-[250px] md:w-1/2 md:block lg:w-1/2 md:block rounded-lg flex justify-center items-center overflow-hidden bg-black"
                        id="dropdown_item_secondbox">
                        <img src='' alt='Sneaker Brands' class='w-full h-full object-cover' id="dropdown_img">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>