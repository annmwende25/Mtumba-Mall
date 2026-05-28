<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

<?php
$products = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
$orders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
$users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
?>

<div class="admin-wrap">
    <div class="admin-side">
        <div class="admin-side-logo">Mtumba <span>Mall</span></div>
        <div class="admin-side-sub">ADMIN PANEL</div>
        <a href="/mtumba-mall/admin/">📊 Dashboard</a>
        <a href="/mtumba-mall/admin/add-product.php">➕ Add Product</a>
        <a href="/mtumba-mall/">🏠 View Site</a>
    </div>
    <div class="admin-main">
        <span class="section-label">Overview</span>
        <h2 class="section-title" style="margin-bottom:8px;">Dashboard</h2>
        <p class="section-sub">Welcome back, Admin!</p>

        <div class="stat-grid">
            <div class="stat-box"><div class="stat-num"><?php echo $products; ?></div><div class="stat-lbl">Total Products</div></div>
            <div class="stat-box"><div class="stat-num"><?php echo $orders; ?></div><div class="stat-lbl">Total Orders</div></div>
            <div class="stat-box"><div class="stat-num"><?php echo $users; ?></div><div class="stat-lbl">Total Users</div></div>
        </div>

        <span class="section-label">Inventory</span>
        <h3 class="section-title" style="font-size:1.8rem; margin-bottom:20px;">All Products</h3>

        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Name</th><th>Category</th><th>Price</th><th>Size</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM products");
                while($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td style="color:#aaa; font-size:0.8rem;">#<?php echo $row['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($row['name']); ?></strong></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td style="color:#C8102E; font-weight:600;">KSh <?php echo number_format($row['price'], 0); ?></td>
                    <td><?php echo htmlspecialchars($row['size']); ?></td>
                    <td><a href="add-product.php?edit=<?php echo $row['id']; ?>" class="btn-warn-sm">Edit</a></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>