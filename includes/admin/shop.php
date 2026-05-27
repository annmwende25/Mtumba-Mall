<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <h2 class="mb-4">Shop All Items</h2>

    <!-- Category Filter -->
    <div class="mb-4">
        <a href="shop.php" class="btn btn-outline-dark me-2">All</a>
        <a href="shop.php?category=Mens" class="btn btn-outline-dark me-2">👔 Men's</a>
        <a href="shop.php?category=Womens" class="btn btn-outline-dark me-2">👗 Women's</a>
        <a href="shop.php?category=Shoes" class="btn btn-outline-dark me-2">👟 Shoes</a>
        <a href="shop.php?category=Kids" class="btn btn-outline-dark me-2">👶 Kids</a>
        <a href="shop.php?category=Accessories" class="btn btn-outline-dark me-2">👜 Accessories</a>
    </div>

    <!-- Products Grid -->
    <div class="row g-4">
        <?php
        $category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';
        if ($category) {
            $result = mysqli_query($conn, "SELECT * FROM products WHERE category='$category'");
        } else {
            $result = mysqli_query($conn, "SELECT * FROM products");
        }
        while($product = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-3">
            <div class="product-card card">
                <img src="assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <div class="card-body">
                    <span class="category"><?php echo $product['category']; ?></span>
                    <h5 class="mt-2"><?php echo $product['name']; ?></h5>
                    <p class="price">KSh <?php echo number_format($product['price'], 2); ?></p>
                    <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary w-100">View Item</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>