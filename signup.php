<?php

require "header.php";

?>

<main>
    <div>
        <section>
            <h1>Sign Up</h1>
            <form action="includes/signup_inc.php" method="post">
                <input type="text" name="user_id" placeholder="Username">
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
