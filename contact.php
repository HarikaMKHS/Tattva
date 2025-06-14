<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com';
    $mail->SMTPAuth = true;
    $mail->Username = '8f8c59001@smtp-brevo.com';
    $mail->Password =  getenv("SMTP_PASSWORD");;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('8f8c59001@smtp-brevo.com', 'Tattva Advisory');
    $mail->addAddress('harika@tattvainvestmentadvisory.com');

    $mail->isHTML(true);
    $mail->Subject = 'New Message from Contact Form';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail->Body = "
        <h3>Contact Form Submission</h3>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ";

    $mail->send();
    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Message failed. Error: {$mail->ErrorInfo}";
}
?>
