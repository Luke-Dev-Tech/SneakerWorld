<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php") ?>
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-md-12 border rounded-4 mt-4">
            <h2>Checkout</h2>
            <hr>
            <div class="d-flex justify-content-between mb-3">
                <p>Total Items:</p>
                <p><?= $total_items ?></p>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <p>Total Amount:</p>
                <p>$ <?= number_format($total_amount, 2) ?></p>
            </div>

            <!-- Additional checkout form -->
            <form action="finalize_checkout.php" method="post">
                <!-- Example fields, add as needed -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Shipping Address</label>
                    <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select id="payment_method" name="payment_method" class="form-select" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <!-- Add more payment options if needed -->
                    </select>
                </div>

                <!-- Hidden fields to pass data to finalize_checkout.php -->
                <input type="hidden" name="total_amount" value="<?= $total_amount ?>">
                <input type="hidden" name="total_items" value="<?= $total_items ?>">

                <button type="submit" class="btn btn-success">Finalize Checkout</button>
            </form>
        </div>
    </div>
</body>

</html>