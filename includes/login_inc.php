<?php

if(isset($_POST['login_submit'])){

    require 'database_handler.php';

    $mailId = $_POST['mail'];
    $password = $_POST['pwd'];

    if(empty($mailId) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE username=? OR mail=?;";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailId, $mailId);


        }

    }

}
else{
    header("Location: ../index.php");
    exit();
}

?>