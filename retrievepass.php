<?php
// Enable error reporting for debugging purposes (change this in production)
error_reporting(E_ALL);

require("init.php"); // Include your initialization file
$uid = cleanvalues($_GET["uid"]);
$email = cleanvalues($_GET["email"]);

// Create a MySQLi connection
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Use prepared statements to prevent SQL injection
$stmt = $mysqli->prepare("SELECT * FROM b_users WHERE email = ? AND userID = ?");
$stmt->bind_param("si", $email, $uid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $newpass = rand(1000000, 2000000);
    $newpass2 = md5($newpass);
    
    // Update the password using prepared statements
    $updateStmt = $mysqli->prepare("UPDATE b_users SET password = ? WHERE userID = ? AND email = ?");
    $updateStmt->bind_param("sis", $newpass2, $uid, $email);
    $updateStmt->execute();
    $updateStmt->close();

    // MAILER
    $from = "$config->title: Password system";
    $subject = "Your new password";
    $message = "This is your new password on $config->title\n
    ____________________\n Password: $newpass\n
    Note: You can change the password to something of your choice from your control panel\n
    ____________________
    Regards, $config->title team";

    // Use a library like PHPMailer to send emails for better control and security

    // Example with PHPMailer:
    // Include PHPMailer and configure it
    // require 'PHPMailer/PHPMailerAutoload.php';
    // $mail = new PHPMailer;
    // $mail->setFrom($from, 'Your Name');
    // $mail->addAddress($email);
    // $mail->Subject = $subject;
    // $mail->Body = $message;
    
    // Send the email
    // if (!$mail->send()) {
    //     echo 'Email could not be sent.';
    //     echo 'Mailer Error: ' . $mail->ErrorInfo;
    // } else {
    //     $msg = "Your new password has been sent to $email";
    //     header("location: index.php?msg=$msg");
    //     exit();
    // }

    // For the sake of simplicity in this example, we're using the mail() function
    if (mail($email, $subject, $message, "From: $from")) {
        $msg = "Your new password has been sent to $email";
        header("location: index.php?msg=$msg");
        exit();
    } else {
        $msg = "Failed to send the new password email";
        header("location: index.php?msg=$msg");
        exit();
    }
} else {
    $msg = "User not found";
    header("location: index.php?msg=$msg");
    exit();
}

// Close the MySQLi connection
$mysqli->close();
?>
