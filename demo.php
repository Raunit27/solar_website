<?php


session_start();
include "config/db.php";
include "config/fun.php";
$connect=new connect();
$fun=new fun($connect->dbconnect());
$msg="";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['enquiry_update'])) {
    $message = htmlspecialchars($_POST['message']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $number = htmlspecialchars($_POST['number']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Create an instance; passing true enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username ='ronniemarshettiwar580@gmail.com'; // SMTP username
        $mail->Password = 'eykgyrhphgborcjb';          // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port = 465; // TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        // Recipients
        $mail->setFrom('ronniemarshettiwar580@gmail.com', 'Mailer');
        $mail->addAddress('rounitmarshettiwar580@gmail.com', 'Joe User'); // Add a recipient

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
        
        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Mail from coursetoon';
        $mail->Body = "Sender name: $name <br> Sender Email: $email  <br> Sender Number: $number <br> Subject: $subject <br> Message: $message";
        // $mail->AltBody ='This is the body in plain text for non-HTML mail clients';
        $mail->send();
        //echo 'Message has been sent';

   

    $result = $fun->enquiry_update($name, $email,$number,$message);
    if ($result) {
         
        
      
       echo "<script>alert('You will get an update');document.location='index.php' </script>";
    } else {
       echo"error";
    }
 


    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
