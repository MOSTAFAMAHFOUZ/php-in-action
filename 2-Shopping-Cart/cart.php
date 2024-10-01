<?php
session_start();
include_once "inc/header.php";
?>
<div class="container">
    <div class="row">
        <?php if (isset($_SESSION['cart_items']) and count($_SESSION['cart_items'])): ?>
        <h1 class="text-center">Cart Page</h1>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>price</th>
                        <th>qty</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart_items'] as $cart_item): ?>
                    <tr>
                        <td><?php echo $cart_item['title']; ?></td>
                        <td><?php echo $cart_item['price']; ?></td>
                        <td><?php echo $cart_item['qty']; ?></td>
                        <td>
                            <a href="delete-item.php?id=<?php echo $cart_item['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <a href="delete-item.php?cart=clear" class="btn btn-danger">Clear All Items</a>
        </div>
        <?php else: ?>
            <div class="col-6 mx-auto text-center">
                <h1 class="text-center text-danger">No Items in The Cart</h1>
                <a href="index.php" class="btn btn-success">Continue Shopping</a>
            </div>

        <?php endif;?>
    </div>
</div>
<?php include_once "inc/footer.php";?>