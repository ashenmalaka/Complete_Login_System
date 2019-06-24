<?php

require "header.php";

?>

<main>
    <div>
        <section>
            <h1>Sign Up</h1>
            <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<p>Fill in all fields</p>';
                }
                else if($_GET['error'] == "invalidmailid_user"){
                    echo '<p>Invalid username and E-mail...!</p>';
                }
                else if($_GET['error'] == "invalidid_user"){
                    echo '<p>Invalid username...!</p>';
                }
                else if($_GET['error'] == "invalidmail"){
                    echo '<p>Invalid E-mail...!</p>';
                }
                else if($_GET['error'] == "passwordcheck"){
                    echo '<p>Entered passwords do not match...!</p>';
                }
                else if($_GET['error'] == "usertaken"){
                    echo '<p>Username is already taken...!</p>';
                }
            }
            else if(isset($_GET['signup']) == "success"){
                echo '<p>Sign Up is successful...!</p>';
            }
            ?>
            <form action="includes/signup_inc.php" method="post">
                <input type="text" name="id_user" placeholder="Username">
                <input type="text" name="mail" placeholder="Email">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd_repeat" placeholder="Repeat Password">
                <button type="submit" name="signup_submit">Sign Up</button>
            </form>
        </section>
    </div>
</main>

<?php

require "footer.php";

?>
