<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Replace with your email address
    $receiving_email_address = 'nclaude701@gmail.com';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = $receiving_email_address;
    $subject = 'New Contact Form Submission: ' . $subject;
    $headers = "From: $email";
    $message = "You have received a new message from the contact form on your website.\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Subject: $subject\n\n";
    $message .= "Message:\n$message";

    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "sent";
    } else {
        // Email sending failed
        echo "not sent";
    }
} else {
    // If the script is accessed directly, return an error message
    echo 'Direct access is not allowed.';
}
?>
