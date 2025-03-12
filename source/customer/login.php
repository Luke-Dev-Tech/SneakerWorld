<?php include("login_handle.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head_data.php"); ?>
    <title>Document</title>
    <style>
        body {
            overflow: hidden;
            /* Prevents scroll */

        }

        .signinupper {
            background-image: url("../../images/welcome.gif");
            background-size: 210px 120px;
            background-repeat: repeat;
            background-position: 50% 50%;
            background-color: black;
        }

        .signindown {
            background-image: url("../../images/signin_bg.gif");
            background-size: contain;
            background-repeat: repeat;
            background-position: 50% 50%;
            background-color: black;
        }
    </style>
</head>

<body class="m-0">
    <div class="w-full h-[50vh] bg-white signinupper">
        <div class="block h-full w-full bg-black bg-opacity-10"></div>
    </div>
    <div class="w-full h-[1vh] flex justify-center items-center bg-black">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-500 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="login_handle.php" method="post">
                <input type="hidden" name="form_type" value="login_form">
                <h5 class="pacifico-regular text-xl font-medium text-gray-900 dark:text-white text-center">Sign in to
                    our Seankers
                    World</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="email" name="login_user_email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name@gmail.com" required />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        password</label>
                    <input type="password" name="login_password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                </div>
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                required />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                            me</label>
                    </div>
                    <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lost
                        Password?</a>
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                    to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="signUp.php" class="text-blue-700 hover:underline dark:text-blue-500">Create
                        account</a> |
                    <a href="index.php" class="text-indigo-700	hover:underline dark:text-indigo-500">
                        <i class="fa-solid fa-house"></i> Home Page
                    </a>
                </div>


            </form>
        </div>
    </div>
    <!-- bg-gradient-to-r from-blue-500 to-purple-600 -->
    <div class="signindown w-full h-[49vh]">
    </div>
</body>

</html>