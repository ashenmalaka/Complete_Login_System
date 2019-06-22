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
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck == false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                else if($passwordCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['user_id'];
                    $_SESSION['userName'] = $row['username'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
                else{
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }

            }
            else{
                header("Location: ../index.php?error=nouser");
                exit();
            }


        }

    }

}
else{
    header("Location: ../index.php");
    exit();
}

?>