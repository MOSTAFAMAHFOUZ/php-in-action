<?php include_once('../inc/header.php'); ?>

<?php

$conn = mysqli_connect("localhost", "root", "", "stock_product");
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);



?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Products Page</h1>
        </div>
        <div class="col-12">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="mb-3">
                    <div class="alert alert-success text-center p-1">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Descritpion</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <span class="badge bg-warning p-1"><?php echo $row['price']; ?> $</span>
                            </td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <img src="../uploads/<?php echo $row['image']; ?>" height="100" width="100" alt="">
                            </td>
                            <td>
                                <a href="<?php echo URL . "product/edit.php?id=" . $row['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo URL . "product/requests/delete.php?id=" . $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once('../inc/footer.php'); ?>