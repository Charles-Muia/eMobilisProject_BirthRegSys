<?php
require "header.php"
?>

    <hr>
    <br>
    <section class="wrapper">
        <main class="">
            <span> * Required Field </span>
<!--            <p>Write to us</p>-->
            <fieldset>
                <legend>
                    <h1>How can we help you today? <br> Write to us, fill in the form below.</h1>
                </legend>
                <br>
<!--                <p>We rely on your feedback to continuously improve and commit to providing excellent services to all our customers.</p>-->
                <!doctype html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport"
                          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="123.css">
                    <title>Document</title>
                </head>
                <body>
                <form action="" method="post" onsubmit="sendEmail(); reset(); return false;">
                    <span> * </span>
                    <input type="text" size="30" name="name" id="nm" placeholder="Enter Your Full Names" required>
                    <span> * </span>
                    <input type="email" size="30" name="email" id="em" placeholder="Enter Your Email Address" required><br><br>
                    <span> * </span>
                    <input type="text" size="40" name="sub" id="sj" placeholder="Subject" required><br><br>

                    <textarea  name="vibe" id="msg" cols="60" rows="10" placeholder="Type your comments or feedback here." required></textarea> <br>

                    <button class="button" type="reset">Clear</button><br>
<!--                    <button class="button3" type="submit" name="submit"> Click to Send </button>-->
                    <button class="button3" type="submit" name="vibe_submit"> Click to Send </button>
                    <br><br>

                </form>

                <script src="https://smtpjs.com/v3/smtp.js"></script>

                <script>
                    function sendEmail (){
                    Email.send({
                        Host : "smtp.elasticemail.com",
                        Username : "teamprivacy22@gmail.com",
                        // Port: "2525",
                        Password : "C8ED18D9AA9385C38244E0D9667DB3841DC8",
                        To : 'Charles.K.Muia@gmail.com',
                        From : document.getElementById("em").value,
                        Subject : "This is the subject",
                        Body : "And this is the body"
                    }).then(
                        message => alert(message)
                    );

           }
                </script>
            </fieldset>
        </main>
    </section>
    </body>
    </html>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyfield/input") {
        echo "<p class='error_message'  id='wrapper'> <span>*</span> Required fields empty, Full Name, Email Address & Subject  </p>";
        exit();
    }
}
if (isset($_GET["success"])) {
    if ($_GET["success"] == "emailsend") {
        echo "<p class='success_message' id='wrapper'> Comments sent successfully, please expect feedback soon. Thank you </p>";
        exit();
    }
}
?>
    <br>
<?php

require "footer.php";

?>