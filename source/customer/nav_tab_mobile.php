<!-- drawer init and toggle -->
<div class="text-center " id="show_drawer">
    <button class="text-white hover:bg-blue-800 font-large rounded-lg text-sm px-5 py-2.5 mb-2" type="button"
        data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
        <i class="fa-solid fa-bars-staggered fa-2x"></i>
    </button>
</div>

<!-- drawer component -->
<div id="drawer-example"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label" class="inline-flex items-center mb-4 text-lg font-semibold text-gray-500 dark:text-gray-400">
        <i class="fa-solid fa-cart-shopping"></i>
        Menu
    </h5>
    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <nav class="bg-gray-800 text-white p-4">
        <ul class="flex flex-col space-x-4">
            <li><a href="index.php" class="hover:text-green-400">Home</a></li>
            <li><a href="About_us.php" class="hover:text-green-400">About</a></li>
            <li><a href="contact.php" class="hover:text-green-400">Contact</a></li>
        </ul>
    </nav>
</div>