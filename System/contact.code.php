<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//    $connect->close();


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

        require 'mail/Exception.php';
        require 'mail/PHPMailer.php';
        require 'mail/SMTP.php';


//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output, comment to avoid the debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'Charles.K.Muia@gmail.com';                     //SMTP username
            $mail->Password = "enter your gmail password";                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = mail::ENCRYPTION_STARTTLS`
            $mail->SMTPAutoTLS = false;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Recipients
            $mail->setFrom('Charles_Muia@outlook.com', 'Admin_Mailer');
            $mail->addAddress('Charles_Muia@outlook.com');     //Add a recipient
//    $mail->addAddress('ellen@example.com');               //Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

//    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJK'),0,10);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset Instructions';
//    $mail->Body    = 'Click on the link to reset your password <a href="http://localhost/eMobilisFinalLap/changepass.php?code='.$code.'">here</a>. Link will be active for 24 hours only <br>';
            $mail->Body    = 'Test email';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";

            $mail->send();
            echo 'Message has been sent, check your email';
        }
////recipient email address
//        $emailTo = "Charles_Muia@outlook.com";
//        $Title = "From: " . $email_from;
//        $Msg = "Alert: You have received a comment / email from" . $name . ".\n\n.$vibe";
//
//
//        mail($emailTo, $sub, $Msg, $Title);
//
//        header("Location ../index.php?success=emailsend");
//        exit();
    }
?>