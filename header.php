<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example for a logging system using PHP">
    <meta name=viewport content="width=device-width, initial-scale=1">
<title>Complete Loging System</title>

</head>
<body>


<header>

    <nav>
        <a href="#">
            <img src="images/user-male.png" alt="logo">
        </a>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">About Me</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>

    <div>
        <?php
        if(isset($_SESSION['userId'])){
            echo '<form action="includes/logout_inc.php" method="post">
                  <button type="button" name="logout_submit">Logout</button>
                  </form>';
        }
        else{
            echo '<form action="includes/login_inc.php" method="post">
                    <input type="text" name="emailid" placeholder="Username/Email...">
                    <input type="password" name="passwordsubmit" placeholder="Password...">
                    <button type="button" name="login_submit">Login</button>
                  </form>
                  <a href="signup.php">Sign Up</a>';
        }
        ?>
    </div>

</header>
</body>
</html>