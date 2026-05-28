<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

<?php
$success = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $_FILES['image']['name'];
    if ($image) {
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $image);
    }
    mysqli_query($conn, "INSERT INTO products (name, price, category, size, image, description) VALUES ('$name','$price','$category','$size','$image','$description')");
    $success = "✅ Product added successfully!";
}
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
        <span class="section-label">Inventory</span>
        <h2 class="section-title" style="margin-bottom:8px;">Add New Product</h2>
        <p class="section-sub">Fill in the details to list a new item</p>

        <?php if($success): ?><div class="alert-success"><?php echo $success; ?></div><?php endif; ?>

        <div class="form-wrap">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-input" placeholder="e.g. Blue Denim Jacket" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Price (KSh)</label>
                    <input type="number" name="price" class="form-input" placeholder="e.g. 850" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-input">
                        <option>Mens</option><option>Womens</option><option>Shoes</option><option>Kids</option><option>Accessories</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Size</label>
                    <select name="size" class="form-input">
                        <option>XS</option><option>S</option><option>M</option><option>L</option><option>XL</option><option>XXL</option><option>One Size</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-input" rows="3" placeholder="Describe the item — condition, color, material..."></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-input" accept="image/*">
                </div>
                <div style="display:flex; gap:14px;">
                    <button type="submit" class="btn-red">Add Product ✅</button>
                    <a href="index.php" class="btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
    