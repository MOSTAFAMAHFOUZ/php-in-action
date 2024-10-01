<?php include_once('../inc/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Cart Page</h1>
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
                        <th>Qty</th>
                        <th>Total Price</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart_items'] as $item) : ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['price']; ?> $</td>
                            <td><?php echo $item['qty']; ?> </td>
                            <td><?php echo $item['total_price']; ?> $</td>
                            <td>
                                <a href="<?php echo URL . "cart/remove-from-cart.php?id=" . $item['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once('../inc/footer.php'); ?>