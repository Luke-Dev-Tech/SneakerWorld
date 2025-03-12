<!-- import header here -->
<?php
include("adminCheckpoint.php");
include("head.php");
include("connect.php");
include("data.php");
$id = $_GET['id'];


$product = getSpecificProduct($pdo, $id);

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
                        <h6 class="rounded-lg box-border p-2 bg-gray-200 flex justify-center items-center w-full text-center text-3xl mb-4 bebas-neue-regular">Update Products</h6>
                        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="product_id" class="form-label">Product ID</label>
                                <input type="number" name="pid" class="form-control" id="product_id"
                                    aria-describedby="product_id">
                            </div>
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Name</label>
                                <input type="text" name="pname" class="form-control" id="prouct_name"
                                    value="<?= $product['Name'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" name="pbrand" class="form-control" id="brand"
                                    value="<?= $product['Brand'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="pdescription" class="form-control" id="description"
                                    value="<?= $product['Description'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="pprice" class="form-control" id="price"
                                    value="<?= $product['Price'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="text" name="prating" class="form-control" id="rating"
                                    value="<?= $product['Rating'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" name="pstock" class="form-control" id="stock"
                                    value="<?= $product['Stock'] ?>">
                            </div>
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <img src="<?= $product['Image'] ?>" alt="Product Image"
                                    style="width:100px; height:100px;">
                                <input type="file" class="form-control" id="img" name="img"
                                    aria-describedby="addon-wrapping">
                                <!-- Hidden field to store the existing image path -->
                                <input type="hidden" name="existing_image" value="<?= $product['Image'] ?>">
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
                $targetDir = $_POST['existing_image']; // Default to existing image

                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    $target = $_FILES['img']['name']; // Corrected the variable name from $terget to $target
                    $tmp = $_FILES['img']['tmp_name'];
                    $targetDir = "../../images/uploaded/" . $target; // Target directory to store the uploaded image
                    move_uploaded_file($tmp, $targetDir); // Moving the uploaded image to the target directory
                }

                $product_name = $_POST['pname'];
                $product_brand = $_POST['pbrand'];
                $product_description = $_POST['pdescription'];
                $product_price = $_POST['pprice'];
                $product_rating = $_POST['prating'];
                $product_stock = $_POST['pstock'];

                $sql = "UPDATE products SET 
                product_name = :name,
                product_brand = :brand,
                product_description = :description,
                product_price = :price,
                product_rating = :rating,
                product_stock = :stock,
                product_pic = :pic                
                WHERE product_id = :id";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id' => $product['ID'],
                    ':name' => $product_name,
                    ':brand' => $product_brand,
                    ':description' => $product_description,
                    ':price' => $product_price,
                    ':rating' => $product_rating,
                    ':stock' => $product_stock,
                    ':pic' => $targetDir
                ]);

                echo "Product Update Successfully!";
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