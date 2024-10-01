<?php
session_start();
if (isset($_SESSION["cart_items"])) {
    if (isset($_GET["cart"])) {
        if ($_GET['cart'] == "clear") {
            unset($_SESSION["cart_items"]);
        }
    }

    if (isset($_GET["id"])) {
        if (isset($_SESSION["cart_items"][$_GET['id']])) {
            unset($_SESSION['cart_items'][$_GET['id']]);
            header('location:cart.php');
            die;
        }
    }
}
header("location:index.php");
die;
