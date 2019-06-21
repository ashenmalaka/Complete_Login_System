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
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidmailid_user=");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&id_user=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidid_user&mail=".$email);
        exit();
    }
    else if ($password !== $password_repeat){
        header("Location: ../signup.php?error=passwordcheck&id_user=".$username."&mail=".$email);
        exit();
    }
    else{

        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck>0){
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else{
                $sql = "INSERT INTO users (username, mail, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username,$email, $hashedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                    }
                }
            }
        }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    }

else{
    header("Location: ../signup.php");
    exit();
}

?>