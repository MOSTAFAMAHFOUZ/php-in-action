<?php
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "stock_product");
    $sql_row = "SELECT * FROM `products` WHERE `id`='$id' ";
    $result_row = mysqli_query($conn, $sql_row);
    $row = mysqli_fetch_assoc($result_row);

    if ($row) {
        $sql = "DELETE FROM `products` WHERE `id`='$id' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            unlink("../../uploads/" . $row['image']);
            $_SESSION['success'] = "Data Deleted Successfully";
        }
    }
}

header("location:../index.php");
die;
