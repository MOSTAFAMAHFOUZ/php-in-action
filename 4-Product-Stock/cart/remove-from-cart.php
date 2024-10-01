<?php
session_start();
const URL = "http://127.0.0.1/product-stock/";


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['cart_items'][$id])) {
        unset($_SESSION['cart_items'][$id]);
        $_SESSION['success'] = "product successfully removed from cart";
    }
}

header("location:" . URL . "cart/index.php");
die;
