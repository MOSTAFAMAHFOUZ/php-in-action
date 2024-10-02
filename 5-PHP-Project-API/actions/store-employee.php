<?php 
session_start();

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    // validation name ( required , min:3 , max:15)

    if(empty($name)){
        $errors['name'] = 'name is required';
    }else if(strlen($name) < 3){
        $errors['name'] = 'name must be at least 3 characters';
    }else if(strlen($name) > 15){
        $errors['name'] = 'name must be less than 15 characters';
    }

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
        $_SESSION['success'] = "data added successfully";
        $employee = [ $name, $email, sha1($password),
        ];
        $database_file = fopen("../database/employees.csv","a+");
        fputcsv($database_file,$employee);
    }else{
        $_SESSION['errors'] = $errors;
    }

    header("Location:../add-employee.php");

}