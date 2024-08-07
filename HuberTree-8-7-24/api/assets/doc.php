<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted email address
    $email = $_POST["email"];

    // Validate the email (you can add more validation if needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please enter a valid email.";
        exit;
    }

    // Set the recipient email address
    $to = "huber@hubertree.com";

    // Set the email subject
    $subject = "New Email Subscription";

    // Set the email body
    $message = "Someone subscribed with the following email address:\n\n";
    $message .= $email;

    // Send the email
    if (mail($to, $subject, $message)) {
        // Redirect to a thank-you page
        header("Location: thankyou.html");
        exit;
    } else {
        echo "Error sending email. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Subscription Form</title>
</head>
<body>
    <h1>Subscribe to Our Newsletter</h1>
    <form method="POST" action="https://hubertree.com/api/assets/doc.php">
        <input type="email" name="email" placeholder="Enter your email address" required>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
