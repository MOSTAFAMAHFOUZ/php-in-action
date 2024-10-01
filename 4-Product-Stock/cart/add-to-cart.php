<?php
session_start();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "stock_product");
    $sql_row = "SELECT * FROM `products` WHERE `id`='$id' ";
    $result_row = mysqli_query($conn, $sql_row);
    $row = mysqli_fetch_assoc($result_row);

    if ($row) {
        if (isset($_SESSION['cart_items'][$row['id']])) {
            $item = $_SESSION['cart_items'][$row['id']];
            $item['qty'] = $item['qty'] + 1;
            $item['total_price'] = $item['qty'] * $item['price'];
            $_SESSION['cart_items'][$row['id']] = $item;
        } else {
            $_SESSION['cart_items'][$row['id']] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'qty' => 1,
                'total_price' => $row['price'] * 1
            ];
        }

        $_SESSION['success'] = "product added to cart successfully";
    }
}

header("location:../index.php");
die;
