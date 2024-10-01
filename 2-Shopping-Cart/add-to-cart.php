<?php
session_start();
include_once "inc/header.php";
include_once "data.php";
$product_id = $_GET['id'];
if (isset($_SESSION["cart_items"])) {
    $cart_items = $_SESSION["cart_items"];
    if (array_key_exists($product_id, $cart_items)) {
        $qty = $_SESSION['cart_items'][$product_id]['qty'];
        $_SESSION['cart_items'][$product_id]['qty'] = $qty + 1;
    } else {
        $product = $products[$product_id];
        $product['qty'] = 1;
        $_SESSION['cart_items'][$product_id] = $product;
    }
} else {
    $product = $products[$product_id];
    $product['qty'] = 1;
    $_SESSION['cart_items'][$product_id] = $product;
}

?>
<div class="container">
    <div class="row">
        <h1 class="text-center bg-success text-white p-3 mt-3">Product - Added To Cart</h1>
        <?php header('Refresh:1; URL=index.php');?>
    </div>
</div>
<?php include_once "inc/footer.php";?>