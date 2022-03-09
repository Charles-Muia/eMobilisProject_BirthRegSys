<?php
require "header.php";

?>

    <br>
    <hr>
    <br>
    <section>
        <main class="wrapper">

            <span> * Required Field </span>
            <fieldset>
            <legend>

            <h1>Reset / Forgotten Password</h1>
            </legend>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consectetur dolores harum, inventore nihil nostrum
                odit quibusdam sit tempora vel! Animi aut cupiditate eius impedit iste modi perspiciatis quos tempora.</p>
            <br>
            <form action="System/resetprocess.code.php" method="post">
                <span> * </span>
                <input type="email" size="40" name="email" placeholder="Enter Your Valid Email Address"><br><br>
                        <button class="button3" type="submit" name="reset_submit">Click to Reset / Forgotten Password</button>
                <br><br>

            </form>
            </fieldset>
        </main>
    </section>
    <br>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfield/input") {
        echo "<p class='error_message'  id='wrapper'> <span>*</span> Enter your correct email address.  </p>";
        exit();
    }
}
?>

<?php

require "footer.php";

?>