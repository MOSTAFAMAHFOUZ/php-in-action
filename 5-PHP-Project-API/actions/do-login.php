<?php 
session_start();

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));


    // email 
    if(empty($email)){
        $errors['email'] = 'email is required';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Invalid email format';
    }

    // password
    if(empty($password)){
        $errors['password'] = 'password is required';
    }else if(strlen($password) < 6){
        $errors['password'] = 'password must be at least 6 characters';
    }else if(strlen($password) > 15){
        $errors['password'] = 'password must be less than 15 characters';
    }


    if(empty($errors)){
        $database_file = fopen("../database/employees.csv","r+");
        while($row = fgetcsv($database_file)){
           
            if($email == $row[1] && $row[2] == sha1($password)){
                $_SESSION['auth'] = $row;
                break;
            }
        }
        fclose($database_file);
        if(!isset($_SESSION['auth'])){
            $_SESSION['errors']['password'] = "email or password is not correct";
        }

    }else{
        $_SESSION['errors'] = $errors;
    }

    header("Location:../login.php");

}