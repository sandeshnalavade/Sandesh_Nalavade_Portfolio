<?php
// Set the recipient email address.
$to = "your-email@example.com";  // 🔁 Replace with your actual email address

// Get form inputs safely
$name = htmlspecialchars(trim($_POST["name"] ?? ''));
$email = htmlspecialchars(trim($_POST["email"] ?? ''));
$subject = htmlspecialchars(trim($_POST["subject"] ?? ''));
$message = htmlspecialchars(trim($_POST["message"] ?? ''));

// Validate fields
if (!$name || !$email || !$subject || !$message) {
    http_response_code(400);
    echo "Please fill in all fields.";
    exit;
}

// Email content
$email_content = "New Contact Form Submission\n";
$email_content .= "Name: $name\n";
$email_content .= "Email: $email\n";
$email_content .= "Subject: $subject\n";
$email_content .= "Message:\n$message\n";

// Email headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// Send the email
if (mail($to, $subject, $email_content, $headers)) {
    echo "Your message has been sent. Thank you!";
} else {
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message.";
}
?>
