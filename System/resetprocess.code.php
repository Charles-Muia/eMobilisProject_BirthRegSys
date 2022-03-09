<?php

//require 'dbconnect.php';


    if (isset($_POST['reset_submit'])){
        $email = $_POST['email'];

        if (empty($email)) {
            header ("location: ../resetpassword.php?error=emptyfield/input");
            exit();
        }
//            else {
        }
//variables
//$email = $_POST['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output, comment to avoid the debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Charles.K.Muia@gmail.com';                     //SMTP username
    $mail->Password   = "enter your gmail password";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = mail::ENCRYPTION_STARTTLS`
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

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJK'),0,10);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Reset Instructions';
    $mail->Body    = 'Click on the link to reset your password <a href="http://localhost/eMobilisFinalLap/changepass.php?code='.$code.'">here</a>. Link will be active for 24 hours only <br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $connect = mysqli_connect("localhost", "root", "", "employees_data");
    if (!$connect) {
        die("Connection to the database failed, please check: " .mysqli_connect_error());
    }

//verify if the user requesting for password reset is existing
    $email = $_POST['email'];
    $verifyQuery = $connect->query("SELECT * FROM employees_list WHERE EmployeeEmail = '$email'");
//if the user exists, then save the Token / code in the db employees_list table row PassResetCode
    if ($verifyQuery->num_rows) {
        $codeQuery = $connect->query("UPDATE employees_list SET PassResetCode = '$code' WHERE EmployeeEmail = '$email'");

        $mail->send();
        echo 'Message has been sent, check your email';
    }
    $connect->close();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
