<?php

    // Include the PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    
    // Autoload PHPMailer (Composer will generate the autoload file)
    require 'vendor/autoload.php';

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                         // Set the SMTP server to Gmail
        $mail->SMTPAuth = true;                                // Enable SMTP authentication
        $mail->Username = 'nitiwadji08@gmail.com';              // SMTP username (your Gmail email)
        $mail->Password = 'ivbu fubk pmrb azfd';               // SMTP password (your Gmail password or App password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Enable TLS encryption
        $mail->Port = 587;                                    // TCP port to connect to (TLS)

        // Recipients
        $mail->setFrom($email, $name);   // From email address and name
        $mail->addAddress('nitiwadji08@gmail.com', 'Niti Wadji'); // Add a recipient's email address

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Message from $name: $subject";                // Email subject
        $mail->Body    = $message;  // HTML body


        // Send email
        $mail->send();
        echo 'Message has been sent';                          // Success message
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Error message
    }

    }
?>


