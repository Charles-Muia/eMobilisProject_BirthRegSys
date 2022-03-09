<?php
//Checks if the user clicked on the vibe_submit button in the contact.php file.
if (isset($_POST['vibe_submit'])) {

//variables in the contact.php form
    $name = $_POST['name'];
    $email_from = $_POST['email'];
    $sub = $_POST['sub'];
    $vibe = $_POST['vibe'];

//checks if the fields are empty
    if (empty($name) || empty($email) || empty($sub)) {
        header("location: ../contact.php?error=emptyfield/input");
        exit();

    } else {
        if (!preg_match("/^[a-zA-Z'0-9 ]*$/", $name)) {
            header("location: ../contact.php?error=Invalidname");
            exit();

        } else {

        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ../contact.php?error=Invalid_email_address");
            exit();

        }
    }


//recipient email address
    $emailTo = "";
    $Title = "From: " . $email_from;
    $Msg = "Alert: You have received a comment / email from" . $name . ".\n\n.$vibe";


    mail($emailTo, $sub, $Msg, $Title);

    header("Location ../index.php?success=emailsend");
    exit();
}