<?php


if (isset($_POST['vibe_submit'])) {


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['sub'])) {
    $name = $_POST['sname'];
    $email_from = $_POST['semail'];
    $subj = $_POST['subj'];
    $vibes = $_POST['vibes'];

    if (empty($name) || empty($email_from) || empty($subj) || empty($vibes)) {
        header("location: ../contact.php?error=emptyfield/input");
        exit();

    } else {

        if (!preg_match("/^[a-zA-Z'0-9 ]*$/", $name)) {
            header("location: ../contact.php?error=Invalidname");
            exit();

        } else {

        }
        if (!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {
            header("location: ../contact.php?error=Invalid_email_address");
            exit();

        }
    }


    require mail\PHPMailer\PHPMailer;
    require PHPMailer\PHPMailer\SMTP;
    require PHPMailer\PHPMailer\Exception;

    require_once "mail/PHPMailer.php";
    require_once "mail/SMTP.php";
    require_once "mail/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
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
    $mail->isHTML(true);
    $mail->setFrom($email_from, $name);
    $mail->addAddress('Charles.K.Muia@gmail.com');     //Add a recipient
    $mail->Subject = ("$email_from ($subj)");
    $mail->Body = $vibes;

    if ($mail->send()) {
        $status = "success";
        $response = "Email is send";
    } else {
        $status = "failed";
        $response = "Something is wrong:" . $mail->ErrorInfo;
    }

    exit();
//    $mail->addAddress('ellen@example.com');               //Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


}
}

