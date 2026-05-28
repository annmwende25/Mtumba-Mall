<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<section class="section">
    <div class="container">
        <?php
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $p = mysqli_fetch_assoc($result);
        if ($p):
        ?>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:start;">
            <div>
                <div class="detail-img">
                    <?php if(!empty($p['image']) && file_exists("assets/images/" . $p['image'])): ?>
                        <img src="assets/images/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
                    <?php else: ?>
                        <div style="text-align:center; color:#ccc;">
                            <div style="font-size:5rem;">👗</div>
                            <div style="font-size:0.75rem; letter-spacing:2px; margin-top:10px; text-transform:uppercase;">No Image</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <span class="detail-cat"><?php echo htmlspecialchars($p['category']); ?></span>
                <h1 class="detail-name"><?php echo htmlspecialchars($p['name']); ?></h1>
                <div class="detail-price">KSh <?php echo number_format($p['price'], 0); ?></div>
                <div class="detail-badge">📏 Size: <strong><?php echo htmlspecialchars($p['size']); ?></strong></div>
                <p class="detail-desc"><?php echo htmlspecialchars($p['description']); ?></p>
                <div style="display:flex; gap:14px; flex-wrap:wrap;">
                    <button onclick="addToCart(<?php echo $p['id']; ?>, '<?php echo addslashes($p['name']); ?>', <?php echo $p['price']; ?>)" class="btn-red" style="font-size:0.9rem; padding:15px 32px;">
                        🛒 Add to Cart
                    </button>
                    <a href="shop.php" class="btn-outline">← Back to Shop</a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div style="text-align:center; padding:80px 20px; color:#aaa;">
            <div style="font-size:4rem; margin-bottom:16px;">😕</div>
            <h3 style="font-family:'Cormorant Garamond',serif; font-size:2rem; color:#333; margin-bottom:12px;">Product Not Found</h3>
            <a href="shop.php" class="btn-dark">Back to Shop</a>
        </div>
        <?php endif; ?>
    </div>
</section>

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