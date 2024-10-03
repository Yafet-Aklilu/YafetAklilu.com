<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize it
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Set the recipient email address
    $to = "yafetaklilu420@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission from $name";
    $email_body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
} else {
    echo "Invalid request.";
}
?>
