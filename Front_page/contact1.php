<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer;

// SMTP configuration
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'kaziriaz09@gmail.com'; // SMTP username
$mail->Password = "gwvcqicloexvglkq"; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

// Sender and recipient settings
$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress('kaziriaz09@gmail.com', 'Riaz'); // Add a recipient

// Email subject and body
$mail->Subject =$_POST['subject'];
$mail->Body = "Name: {$_POST['name']} \nEmail: {$_POST['email']} \n\nMessage: {$_POST['message']}";
;

// Send the email
if (!$mail->send()) {
    echo '<script>alert("Message could not be sent Mailer Error: '. $mail->ErrorInfo.'");window.location.href = "contact.php";</script>';
} else {
    echo '<script>alert("Message has been sent");window.location.href = "contact.php";</script>';
}
?>
