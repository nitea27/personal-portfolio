<?php
echo "hello";
print_r($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "hi";
    $name = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    
    // Send the email (you'll need to set up an SMTP server or use an API like SendGrid or Mailgun)
    $to = "nitiwadji08@gmail.com";
    $headers = "From: $email";
    $email_subject = "Message from $name: $subject";
    
    $email_body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
    
    if(mail($to, $email_subject, $email_body, $headers)) {
        header("Location: " . $_SERVER['PHP_SELF']);
    } else {
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}
?>
