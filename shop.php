<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<section class="section">
    <div class="container">
        <span class="section-label">Mtumba Mall</span>
        <h2 class="section-title">Shop All <em>Items</em></h2>
        <p class="section-sub">Quality second hand clothes at unbeatable KSh prices</p>

        <?php $cat = isset($_GET['category']) ? $_GET['category'] : ''; ?>
        <div class="cat-pills">
            <a href="shop.php" class="cat-pill <?php echo $cat=='' ? 'active' : ''; ?>">All Items</a>
            <a href="shop.php?category=Mens" class="cat-pill <?php echo $cat=='Mens' ? 'active' : ''; ?>">👔 Men's</a>
            <a href="shop.php?category=Womens" class="cat-pill <?php echo $cat=='Womens' ? 'active' : ''; ?>">👗 Women's</a>
            <a href="shop.php?category=Shoes" class="cat-pill <?php echo $cat=='Shoes' ? 'active' : ''; ?>">👟 Shoes</a>
            <a href="shop.php?category=Kids" class="cat-pill <?php echo $cat=='Kids' ? 'active' : ''; ?>">👶 Kids</a>
            <a href="shop.php?category=Accessories" class="cat-pill <?php echo $cat=='Accessories' ? 'active' : ''; ?>">👜 Accessories</a>
        </div>

        <div class="products-grid">
            <?php
            $category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';
            if ($category) {
                $result = mysqli_query($conn, "SELECT * FROM products WHERE category='$category'");
            } else {
                $result = mysqli_query($conn, "SELECT * FROM products");
            }
            if ($result && mysqli_num_rows($result) > 0):
                while($p = mysqli_fetch_assoc($result)):
            ?>
            <div class="product-card">
                <div class="product-img">
                    <?php if(!empty($p['image']) && file_exists("assets/images/" . $p['image'])): ?>
                        <img src="assets/images/<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
                    <?php else: ?>
                        <div class="product-no-img"><span>👗</span><span>No Image</span></div>
                    <?php endif; ?>
                    <span class="product-cat-badge"><?php echo htmlspecialchars($p['category']); ?></span>
                </div>
                <div class="product-body">
                    <div class="product-name"><?php echo htmlspecialchars($p['name']); ?></div>
                    <div class="product-size">Size: <?php echo htmlspecialchars($p['size']); ?></div>
                    <div class="product-footer">
                        <span class="product-price">KSh <?php echo number_format($p['price'], 0); ?></span>
                        <a href="product.php?id=<?php echo $p['id']; ?>" class="btn-card">View →</a>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
            <div style="grid-column:1/-1; text-align:center; padding:60px; color:#aaa;">
                No items found. <a href="shop.php" class="btn-outline" style="margin-top:16px;">View All</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>