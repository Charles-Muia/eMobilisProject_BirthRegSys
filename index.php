<?php
require "header.php";
?>
    <br>
    <hr>
    <main id="main">
        <br>
<section class="wrapper">

    <?php
   if (isset($_SESSION['fullname'])) {
echo '
<p> 
You have logged in successfully. <br> <br> Click on the link or button below to access the System. <br><br>
<a class="button2" href="Valid_2.php">Registration Form</a> <br><br> <button class="button3" type="button">Civil Registration Form</button><br><br></p>
';
   }
   else {
echo ' <p>You have logged out successfully, please log in to continue using the system.</p>';
   }
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
    </html>





</section>
    </main>

<?php

require "footer.php";

?>
