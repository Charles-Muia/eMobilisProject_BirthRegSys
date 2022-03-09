<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="123.css">
    <title>Header</title>
</head>
<body>
<div class="">

    <hr>
    <header>
        <nav>
            <br>
            <a href="">
                <img src="ProjectImages/NCCjpg.png" alt="logo">
            </a>

            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="AboutUS.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="https://data.unicef.org/crvs/kenya/">FAQ</a> </li>
            </ul>
            <br>

</div>
<hr>
<div class="">
    <br>

    <?php
    if (isset($_SESSION['email'])) {
        echo '<form action="System/logout.code.php" method="post"> 
                        <button type="submit" name="logout-submit"> Log Out </button>
            </form>';
    }
    else {
        echo '<form action="System/login.code.php" method="post">
                    <span>*</span>
            <input type="text" name="fullname" placeholder="Enter Your Full Name">
                    <span>*</span>
            <input type="email" name="email" placeholder="Enter Your Email Address">    
                    <span>*</span>
            <input type="password" name="userpass" placeholder="Enter Your Password">
            <span>  |  </span>
            <button type="submit" name="login-submit">Log In</button>
            </form>
        <a href="signup.php" class="button2"> Register / Forgot Password? </a>';
    }
    echo "<br>";
    echo "<br>";
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <img src="ProjectImages/Vital.jpg" alt="" width="1355">

<!--    <h1>Partners</h1>-->
    <div>


    </div>



    </body>
    </html>




    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyarefields") {
            echo "<p class='error_message' id='wrapper'> Missing credentials, fill in the required marked <span>*</span> </p>";
            exit();
        } else if ($_GET["error"] == "nouser") {
            echo "<p class='error_message' id='wrapper'> Fullname or Email doesn't exist, please register to log in. </p>";
            exit();
        } else if ($_GET["error"] == "Invalid_email_address") {
            echo "<p class='error_message' id='wrapper'> Incorrect or invalid email address, use the correct format. </p>";
            exit();
        } else if ($_GET["error"] == "Invalidfull_Username") {
            echo "<p class='error_message' id='wrapper'> Only letters are required. </p>";
            exit();
        } else if ($_GET["error"] == "wrongpassword") {
            echo "<p class='error_message' id='wrapper'> You have entered the wrong password. </p>";
            exit();
        } else if ($_GET["error"] == "sqlerror") {
            echo "<p class='error_message' id='wrapper'> Connection to the database failed, please check if XAMPP is running. </p>";
            exit();
        } else if ($_GET["error"] == "emaildoesnotexist") {
            echo "<p class='error_message' id='wrapper'> Email Address not registered. </p>";
            exit();
        } else if ($_GET["error"] == "wrongusername") {
            echo "<p class='error_message' id='wrapper'> You have entered the wrong password. </p>";
            exit();
        }
    }
    if (isset($_GET["login"])) {
        if ($_GET["login"] == "success2") {
            echo "<p class='success_message' id='wrapper'> Log In successful. </p>";
            exit();
        }
    }
    ?>
</div>
</nav>
</header>

<section class="wrapper">



</section>

</body>
</html>

<?php

require "footer.php";

?>