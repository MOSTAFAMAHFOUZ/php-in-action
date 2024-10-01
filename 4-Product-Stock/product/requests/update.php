<?php
session_start();
$errors = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "stock_product");
    $sql_row = "SELECT * FROM `products` WHERE `id`='$id' ";
    $result_row = mysqli_query($conn, $sql_row);
    $row = mysqli_fetch_assoc($result_row);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // name , price , description , image
    $name = trim(htmlentities($_POST["name"]));
    $price = trim(htmlentities($_POST["price"]));
    $description = trim(htmlentities($_POST["description"]));
    $image = $_FILES['image'];



    // validation 
    // name => required , min:3 , max:40
    if (empty($name)) {
        $errors[] = "Name is Required";
    } else if (strlen($name) < 3) {
        $errors[] = "Name must be greater than 3 chars";
    } else if (strlen($name) > 40) {
        $errors[] = "Name must be samller than 40 chars";
    } else if (!preg_match("/^[a-zA-Z0-9\s]+$/", $name)) {
        $errors[] = "Name must be a valid string";
    }

    // price
    if (empty($price)) {
        $errors[] = "Price is Required";
    } else if (!is_numeric($price)) {
        $errors[] = "Price must be a valid number";
    }

    // description 
    if (empty($description)) {
        $errors[] = "description is Required";
    } else if (strlen($description) < 10) {
        $errors[] = "description must be greater than 10 chars";
    } else if (strlen($description) > 250) {
        $errors[] = "description must be samller than 250 chars";
    } else if (!preg_match("/^[a-zA-Z0-9\s]+$/", $description)) {
        $errors[] = "description must be a valid string";
    }


    if (!$image['name']) {
        // $errors[] = "image is required";
        $new_image_name = $row['image'];
    } else {
        $allowed_types = ["image/png", "image/jpg", "image/jpeg"];
        $allowed_extensions = ["png", "jpeg", "jpg"];
        $image_name = explode(".", $image['name']);
        $ext = end($image_name);

        $mime_type = mime_content_type($image['tmp_name']);

        if (!in_array($ext, $allowed_extensions) || !in_array($mime_type, $allowed_types)) {
            $errors[] = "image is not supported , please choose another file";
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {

        if (!isset($new_image_name)) {

            $new_image_name = time() . "." . $ext;
            move_uploaded_file($image['tmp_name'], "../../uploads/" . $new_image_name);
            unlink('../../uploads/' . $row['image']);
        }
        // insert to db
        try {
            $conn = mysqli_connect("localhost", "root", "", "stock_product");
            $sql = "UPDATE `products` SET`name`='$name',`price`='$price',`description`='$description',`image`='$new_image_name' WHERE `id`='$id' ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['success'] = "Data Updated Successfully";
            }
        } catch (Exception $e) {
            $_SESSION['errors'][] = "Database Error : " . mysqli_error($conn);
        }
    }
}

header("location:../edit.php?id=$id");
die;
