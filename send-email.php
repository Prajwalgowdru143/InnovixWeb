<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Validate the data (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill out all fields.";
        exit;
    }

    // Set recipient email address
    $to = "pajju2pg@gmail.com";

    // Create email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Compose the email message
    $email_message = "
    <html>
    <head>
    <title>Contact Form Submission</title>
    </head>
    <body>
    <h2>Contact Form Submission</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong></p>
    <p>$message</p>
    </body>
    </html>
    ";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
