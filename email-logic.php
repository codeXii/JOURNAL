<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './vendor/autoload.php';
require './config/database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // var_dump($_POST);
    // die();

    // Validate and sanitize input
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'cerpart.org';               // SMTP Host
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noreply@cerpart.org';       // SMTP Username
        $mail->Password   = 'Noreply@1234';        // SMTP Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use SSL
        $mail->Port       = 465;                         // SMTP Port

        // Sender and recipient
        $mail->setFrom('noreply@cerpart.org', 'Contact Form');
        $mail->addAddress('noreply@cerpart.org', 'CERPART'); // Change to your receiving email

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New message from $name";
        $mail->Body    = "
            <h3>Contact Form Submission</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        $_SESSION['contact-success'] = 'YOUR MESSAGE WAS SENT SUCCESSFULLY.';
        header('location:' . ROOT_URL . 'contact.php');
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



