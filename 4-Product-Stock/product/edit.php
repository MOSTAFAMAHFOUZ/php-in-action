<?php
include_once('../inc/header.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "stock_product");
    $sql_row = "SELECT * FROM `products` WHERE `id`='$id' ";
    $result_row = mysqli_query($conn, $sql_row);
    $row = mysqli_fetch_assoc($result_row);
    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";
}


?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="border p-3 text-center my-3">Edit Product</h1>
        </div>
        <div class="col-12">
            <form action="<?php echo URL . "product/requests/update.php?id=$id" ?>" class="form p-4 border" method="POST" enctype="multipart/form-data">
                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="mb-3">
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <div class="alert alert-danger text-center p-1">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="mb-3">
                        <div class="alert alert-success text-center p-1">
                            <?php echo $_SESSION['success']; ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" value="<?php echo $row['name']; ?>" name="name" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Price</label>
                    <input type="text" value="<?php echo $row['price']; ?>" name="price" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <input type="text" value="<?php echo $row['description']; ?>" name="description" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" id="" class="form-control">
                </div>

                <div class="mb-3">
                    <input type="submit" value="Save" id="" class="form-control bg-success text-white">
                </div>
                <div class="mb-3 text-center">
                    <img src="../uploads/<?php echo $row['image']; ?>" height="300" width="300" alt="">
                </div>

            </form>
        </div>
    </div>
</div>

<?php include_once('../inc/footer.php'); ?>