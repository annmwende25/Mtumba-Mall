<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<section class="hero">
    <div class="hero-bg-text">MTUMBA</div>
    <div class="hero-glow"></div>
    <div class="hero-glow2"></div>
    <div class="hero-content">
        <div class="hero-tag">🇰🇪 Nairobi's Finest Mitumba Shop</div>
        <h1>Find Your <em>Style</em><br><span class="outline">For Less</span></h1>
        <p class="hero-desc">Hundreds of quality second-hand clothes, shoes & accessories — curated and priced in KSh. New arrivals every week.</p>
        <div class="hero-buttons">
            <a href="shop.php" class="btn-main">Shop Now →</a>
            <a href="shop.php?category=Womens" class="btn-ghost">Women's Collection</a>
        </div>
        <div class="hero-stats">
            <div>
                <div class="hero-stat-num">500+</div>
                <div class="hero-stat-label">Items Listed</div>
            </div>
            <div>
                <div class="hero-stat-num">KSh 200</div>
                <div class="hero-stat-label">Starting From</div>
            </div>
            <div>
                <div class="hero-stat-num">5 ★</div>
                <div class="hero-stat-label">Trusted Shop</div>
            </div>
        </div>
    </div>
</section>

<section class="section" style="padding-bottom:20px;">
    <div class="container">
        <span class="section-label">Browse By</span>
        <div class="cat-pills">
            <a href="shop.php" class="cat-pill active">All Items</a>
            <a href="shop.php?category=Mens" class="cat-pill">👔 Men's Wear</a>
            <a href="shop.php?category=Womens" class="cat-pill">👗 Women's Wear</a>
            <a href="shop.php?category=Shoes" class="cat-pill">👟 Shoes</a>
            <a href="shop.php?category=Kids" class="cat-pill">👶 Kids</a>
            <a href="shop.php?category=Accessories" class="cat-pill">👜 Accessories</a>
        </div>
    </div>
</section>

<section class="section" style="padding-top:20px;">
    <div class="container">
        <span class="section-label">New Arrivals</span>
        <h2 class="section-title">Featured <em>Items</em></h2>
        <p class="section-sub">Handpicked quality pieces just for you</p>
        <div class="products-grid">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM products LIMIT 8");
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
                No products yet — add some from the admin panel!
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="container">
        <div class="promo">
            <div class="promo-content">
                <span class="section-label" style="color:var(--gold);">Limited Time</span>
                <h2>New Arrivals <em>Every Week!</em></h2>
                <p>Don't miss the freshest mitumba drops — browse the shop daily for new stock at unbeatable prices.</p>
                <a href="shop.php" class="btn-main">Browse All Items →</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>