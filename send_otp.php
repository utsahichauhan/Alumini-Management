
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require 'phpmailer-master/src/Exception.php';
require 'phpmailer-master/src/PHPMailer.php';
require 'phpmailer-master/src/SMTP.php';

// Start session
session_start();

// Check if form is submitted for email verification
if (isset($_POST['email_submit'])) {
    $email = $_POST['email'];

    // Generate random OTP
    $otp = mt_rand(100000, 999999);
    $_SESSION['otp'] = $otp; // Store OTP in session

    // Send OTP to user's email
    if (sendOTP($email, $otp)) {
        // OTP sent successfully, redirect to enter_otp.php page
        header("Location: enter_otp.php?email=" . urlencode($email));
        exit();
    } else {
        echo "Failed to send OTP. Please try again.";
    }
}

// Function to send OTP to user's email using PHPMailer
function sendOTP($email, $otp) {
    // Create a PHPMailer instance
    $mail = new PHPMailer();

    // SMTP settings
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'apmc7636@gmail.com'; // Your SMTP username
    $mail->Password = 'zgsfmccjpbhyhusz'; // Your SMTP password
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

    // Email settings
    $mail->setFrom('your_email@gmail.com', 'Password Reset'); // Sender's email address and name
    $mail->addAddress($email); // Recipient's email address
    $mail->Subject = 'Reset Your Password - OTP Verification';
    $mail->Body = 'Hi your OTP for password reset is: ' . $otp;

    // Send email
    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}
?>
