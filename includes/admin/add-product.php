<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $image);
    mysqli_query($conn, "INSERT INTO products (name, price, category, size, image, description) VALUES ('$name', '$price', '$category', '$size', '$image', '$description')");
    echo "<div class='alert alert-success container mt-3'>Product added successfully! ✅</div>";
}
?>

<div class="container my-5">
    <h2>➕ Add New Product</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price (KSh)</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category" class="form-control">
                <option>Mens</option>
                <option>Womens</option>
                <option>Shoes</option>
                <option>Kids</option>
                <option>Accessories</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Size</label>
            <select name="size" class="form-control">
                <option>XS</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
                <option>XXL</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product ✅</button>
        <a href="index.php" class="btn btn-outline-dark ms-2">Cancel</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>