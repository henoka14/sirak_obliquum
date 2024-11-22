<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the recipient email address
    $to = "henokcoco@gmail.com";

    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Create the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Email subject and body
    $email_subject = "New Message from Your Website: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Here are the details:\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request. Please submit the form.";
}
?>
