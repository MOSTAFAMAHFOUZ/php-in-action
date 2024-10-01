<?php include_once('inc/header.php'); ?>
<?php

$conn = mysqli_connect("localhost", "root", "", "stock_product");
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Home Page</h1>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="mb-3">
                    <div class="alert alert-success text-center p-1">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>

            <div class="col-4 mb-3">
                <div class="card">
                    <img src="uploads/<?php echo $row['image']; ?>" height="414" width="100%" class="card-img-top p-2 border" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <h6 class="text-primary">Price : <?php echo $row['price']; ?> $</h6>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <a href="<?php echo URL . 'cart/add-to-cart.php?id=' . $row['id']; ?>" class="btn btn-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include_once('inc/footer.php'); ?>