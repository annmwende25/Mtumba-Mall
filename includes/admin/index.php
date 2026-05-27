<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 admin-sidebar">
            <h5 class="text-white mb-4">⚙️ Admin</h5>
            <a href="/mtumba-mall/admin/">📊 Dashboard</a>
            <a href="/mtumba-mall/admin/add-product.php">➕ Add Product</a>
            <a href="/mtumba-mall/">🏠 View Site</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <h2>Dashboard</h2>
            <?php
            $products = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
            $orders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
            $users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
            ?>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-center p-4 shadow">
                        <h3><?php echo $products; ?></h3>
                        <p>Total Products</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 shadow">
                        <h3><?php echo $orders; ?></h3>
                        <p>Total Orders</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 shadow">
                        <h3><?php echo $users; ?></h3>
                        <p>Total Users</p>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <h4 class="mt-5">All Products</h4>
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM products");
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>KSh <?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo $row['size']; ?></td>
                    <td>
                        <a href="add-product.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>