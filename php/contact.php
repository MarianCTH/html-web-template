<?php
require 'PHPMailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["comments"];

    $mail = new PHPMailer;

    $mail->SMTPDebug = 0;

    $mail->isSMTP();

    $mail->Host = 'your-smtp-host.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-smtp-username';
    $mail->Password = 'your-smtp-password';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom($email, $name);
    $mail->addAddress('comunicare@arice.gov.ro', 'New Contact From Rocreativity');

    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}
