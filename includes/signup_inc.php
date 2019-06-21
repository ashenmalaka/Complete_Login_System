<?php

if(isset($_POST['signup_submit'])){

    require 'database_handler.php';

    $username = $_POST('user_id');
    $email = $_POST('mail');
    $password = $_POST('pwd');
    $password_repeat = $_POST('pwd_repeat');

    if(empty($username) || empty($email) || empty($password) || empty($password_repeat)){
        header("Location: ../signup.php?error=emptyfields&user_id=".$username."&mail=".$email);
        exit();
    }


}

















?>
