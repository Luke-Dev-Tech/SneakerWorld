<div id="cartbox_div"
    class="block cartbox transition-all duration-100 ease-in-out p-[10px] box-border flex justify-center items-center rounded-lg">
    <button class="chatbot-btn bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg hover:bg-cyan-700"
        id="cartbox_agent" title="Cart" onclick="window.location.href = 'shoppingcart.php'">
        <lord-icon id="cart_logo" src="https://cdn.lordicon.com/ggirntso.json" trigger="hover"
            colors="primary:#ffffff,secondary:#c74b16" style="width:50px;height:50px">
        </lord-icon>
    </button>

    <span class="hidden absolute flex h-3 w-3 top-1.5 right-1.5" id="itemsExistInCartNoti">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-500	 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500	"></span>
    </span>
</div>
<script>
    // PHP session variable embedded in JavaScript
    let cartNoti = () => {
        let notification = document.getElementById("itemsExistInCartNoti");
        var itemsInsideShoppingCart =
            "<?php echo isset($_SESSION['cartItemsId']) and count($_SESSION['cartItemsId']) > 0 ? true : false; ?>";

        if (itemsInsideShoppingCart) {
            console.log("HI");
            notification.classList.remove("hidden");
        } else {
            console.log("Hey");
            notification.classList.add("hidden");
        }
    }
    cartNoti();
</script>