<?php

if(isset($_POST['signup_submit'])){

    require 'database_handler.php';

    $username = $_POST['id_user'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $password_repeat = $_POST['pwd_repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($password_repeat)){
        header("Location: ../signup.php?error=emptyfields&id_user=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/, $username")){
        header("Location: ../signup.php?error=invalidmailid_user=");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&id_user=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/, $username")){
        header("Location: ../signup.php?error=invalidid_user&mail=".$email);
        exit();
    }
    else if ($password !== $password_repeat){
        header("Location: ../signup.php?error=passwordcheck&id_user=".$username."&mail=".$email);
        exit();
    }
    else{


    }



}

















?>
