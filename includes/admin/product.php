<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <?php
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : 0;
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
    $product = mysqli_fetch_assoc($result);
    if ($product) {
    ?>
    <div class="row">
        <div class="col-md-5">
            <img src="assets/images/<?php echo $product['image']; ?>" class="img-fluid rounded" alt="<?php echo $product['name']; ?>">
        </div>
        <div class="col-md-7">
            <span class="category"><?php echo $product['category']; ?></span>
            <h2 class="mt-2"><?php echo $product['name']; ?></h2>
            <p class="price fs-3">KSh <?php echo number_format($product['price'], 2); ?></p>
            <p><strong>Size:</strong> <?php echo $product['size']; ?></p>
            <p><?php echo $product['description']; ?></p>
            <button onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo $product['name']; ?>', <?php echo $product['price']; ?>)" class="btn btn-primary btn-lg">
                🛒 Add to Cart
            </button>
            <a href="shop.php" class="btn btn-outline-dark btn-lg ms-2">← Back to Shop</a>
        </div>
    </div>
    <?php } else { ?>
        <p>Product not found.</p>
    <?php } ?>
</div>

<script>
function addToCart(id, name, price) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push({ id, name, price });
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(name + ' added to cart! 🛒');
    updateCartCount();
}
</script>

<?php include 'includes/footer.php'; ?>