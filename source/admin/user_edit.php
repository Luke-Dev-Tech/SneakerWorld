<!-- import header here -->
<?php
include("adminCheckpoint.php");
include("head.php");
include("connect.php");
include("data.php");
$id = $_GET['id'];


$user = getSpecificUser($pdo, $id);

?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <!-- import spinner here -->
    <?php
    include("spinner.php");
    ?>
    <!-- Spinner End -->

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
        <?php
        include("navbar.php");
        ?>
        <!-- Navbar End -->

        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12 px-lg-5">
                    <div class="bg-light rounded h-100 p-4">
                        <h6
                            class="rounded-lg box-border p-2 bg-gray-200 flex justify-center items-center w-full text-center text-3xl mb-4 bebas-neue-regular">
                            Update User</h6>
                        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="user_id" class="form-label">ID</label>
                                <input type="number" name="uid" class="form-control" id="user_id"
                                    aria-describedby="product_id" value="<?= $user['ID'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="user_name" class="form-label">Name</label>
                                <input type="text" name="uname" class="form-control" id="user_name"
                                    value="<?= $user['Name'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="user_brand" class="form-label">Email</label>
                                <input type="text" name="uemail" class="form-control" id="user_brand"
                                    value="<?= $user['Email'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="text" name="upassword" class="form-control" id="user_password"
                                    value="<?= $user['Password'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="user_role" class="form-label">Role</label>
                                <select id="user_role" name="urole"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php if ($user['Role'] == "Admin"): ?>
                                        <option value="Admin" selected>Admin</option>
                                        <option value="Client">Client</option>
                                    <?php else: ?>
                                        <option value="Admin">Admin</option>
                                        <option value="Client" selected>Client</option>
                                    <?php endif ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
        <?php
        if (isset($_POST['submit'])) {
            try {
                $user_name = $_POST['uname'];
                $user_email = $_POST['uemail'];
                $user_password = $_POST['upassword'];
                $user_role = $_POST['urole'];

                $sql = "UPDATE users SET 
    user_name = :name,
    user_email = :email,
    user_password = :password,
    user_role = :role
    WHERE user_id = :id";


                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                    ':name' => $user_name,
                    ':email' => $user_email,
                    ':password' => $user_password,
                    ':role' => $user_role
                ]);

                echo "User Updated Successfully!";
            } catch (Exception $e) {
                echo "Error updating product: " . $e->getMessage();
            }
        }
        ?>


        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Sneakers World</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->
</div>

<!-- JavaScript Libraries -->
<?php include("jslibs.php");  ?>