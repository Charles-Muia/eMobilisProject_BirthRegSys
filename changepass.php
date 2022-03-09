<?php
require "header.php";
?>

<br>
<hr>

<section>
    <main class="wrapper">
        <span> * Required Fields  </span>
        <fieldset>
            <legend>

                <h1>Password Reset</h1>
            </legend>
            <form class="input" action="System/changepass.code.php" method="post"><br>
<!--                <span> * </span>-->
<!--                <input type="text" size="25" name="fullname" placeholder="Enter Your Full Names"> <br>-->
<!--                <span> * </span>-->
<!--                <input type="email" size="25" name="email" placeholder="Email Address"> <br>-->
<!--                <span> * </span>-->
<!--                <input type="text" size="25" name="username" placeholder="Enter Your User Name"> <br>-->
                <span> * </span>
                <input type="email" size="25" name="email" placeholder="Enter Your Email Address"> <br>
                <span> * </span>
                <input type="password" size="25" name="new_password" placeholder="Enter Your New Password"><br>
                <br>
                <button class="button3" type="submit" name="change_submit">Change Password</button>
                <br>
<!--                <button type="reset"> Clear </button>-->


            </form>
            <br>
            <legend>
<!--                <a class="button2" href="resetpassword.php"> Reset / Forgotten Password?</a>-->
            </legend>

            <br>
    </main>

</section>

</fieldset>

<!---->
<?php
//if (isset($_GET["error"])) {
//    if ($_GET["error"] == "emptyfields/inputs") {
//        echo "<p class='error_message'  id='wrapper'> Please fill in all the required fields marked. <span>*</span> </p>";
//        exit();
//    } else if ($_GET["error"] == "Invalidnames") {
//        echo "<p class='error_message' id='wrapper'> Incorrect full or username, only letters are required. </p>";
//        exit();
//    } else if ($_GET["error"] == "Invalid_email") {
//        echo "<p class='error_message' id='wrapper'> Incorrect or invalid email address, use the correct format. </p>";
//        exit();
//    } else if ($_GET["error"] == "InvalidUsername") {
//        echo "<p class='error_message' id='wrapper'> Invalid username, only letters are required 2. </p>";
//        exit();
//    } else if ($_GET["error"] == "PasswordDoNotMatch") {
//        echo "<p class='error_message' id='wrapper'> Your password did not match. </p>";
//        exit();
//    } else if ($_GET["error"] == "sqlerror") {
//        echo "<p class='error_message' id='wrapper'> Connection to the database failed, please check if XAMPP is running. </p>";
//        exit();
//    } else if ($_GET["error"] == "usernameoremailalreadyexists") {
//        echo "<p class='error_message' id='wrapper'> Email Address already exist, please use a different one. </p>";
//        exit();
//    }
//}
//if (isset($_GET["signup"])) {
//    if ($_GET["signup"] == "success") {
//        echo "<p class='success_message' id='wrapper'> Signup successful, please log In. </p>";
//        exit();
//    }
//}
?>

<?php

require "footer.php";

?>
