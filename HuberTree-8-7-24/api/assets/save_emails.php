<?php
// Database configuration
$host = 'localhost';
$username = 'your_db_username';
$password = 'your_db_password';
$database = 'your_db_name';

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted email address
    $email = $_POST["email"];

    // Validate the email (you can add more validation if needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please enter a valid email.";
        exit;
    }

    // Insert the email into the database
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Email address saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
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
    <form method="POST" action="https://hubertree.com/api/assets/save_emails.php">
        <input type="email" name="email" placeholder="Enter your email address" required>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
