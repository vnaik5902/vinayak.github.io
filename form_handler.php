<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "vnaik5902@gmail.com"; // Your email address

    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $number = $_POST["number"];

    // Validate phone number
    if (!preg_match("/^[0-9]{10}$/", $number)) {
        echo "Invalid phone number. Please enter a 10-digit phone number.";
        exit(); // Stop further execution
    }

    // Create email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n";
    $email_content .= "Phone Number: $number\n";

    // Set up email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email.";
    }
}
?>
