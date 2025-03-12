<!-- import header here -->
<?php
include("adminCheckpoint.php");
require_once("head.php");
require_once("connect.php");
require_once("data.php");
$users = getUsers($pdo);

?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <!-- import spinner here -->
    <?php include("spinner.php");  ?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <!-- import sidebar here -->
    <?php include("sidebar.php"); ?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <!-- import navbar here -->
        <?php include("navbar.php"); ?>
        <!-- Navbar End -->

        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6
                            class="rounded-lg box-border p-2 bg-gray-200 flex justify-center items-center w-full text-center text-3xl mb-4 bebas-neue-regular">
                            Users Table</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php foreach (array_keys($users[0]) as $title): ?>
                                        <th scope="col"><?= $title ?></th>

                                        <?php endforeach    ?>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user['ID'] ?></td>
                                        <td><?= $user['Name'] ?></td>
                                        <td><?= $user['Email'] ?></td>
                                        <td><?= $user['Password'] ?></td>
                                        <td><?= $user['Role'] ?></td>
                                        <td>
                                            <form>
                                                <a href=<?= "user_edit.php?id=" . $user['ID'] ?>
                                                    class="btn btn-secondary"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <a href=<?= "user_delete.php?id=" . $user['ID'] ?>
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->


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