    <div id="login_container" class="login_container ">
        <div id="login" class="login bg-gradient-to-r from-blue-500 to-purple-600 h-fit">
            <img src="../../images/login_.gif" alt="login_.gif">
            <form action="login_handle.php" class="login_form" method="post">
                <input type="hidden" name="form_type" value="login_form">
                <label for="login_user_email" class="login_form_label">Email </label>
                <input type="text" id="login_user_email" class="login_input rounded-lg"
                    placeholder="Enter your email address" name="login_user_email">
                <label for="login_password" class="login_form_label">Password </label>
                <input type="password" class="login_input rounded-lg" id="login_password"
                    placeholder="Enter your password here" name="login_password">
                <button type="submit"
                    class="col-span-2 box-border block w-full text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    id="login_button">
                    Login
                </button>
            </form>
            <div>
                <a href="#" class="login_forgot">
                    Forgot Password
                </a>
                |
                <button onclick="window.location.href = 'signUp.php'">
                    Create Account
                </button>
            </div>
        </div>
    </div>