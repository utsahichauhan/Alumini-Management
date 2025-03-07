<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css-files/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="login.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <img src="images/2.jpg">
        <div class="container col-lg-4 col-md-5 col-sm-5 col-xs-10">
            <div class="signup">Enter OTP</div>
            <div class="signup-form">
                <form method="post">
                    <label for="otp">Enter OTP</label>
                    <input type="text" placeholder="Enter OTP" class="input" id="otp" name="otp" required><br>
                    <button type="submit" class="btn" name="otp_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
<?php
session_start();
// Check if OTP is stored in session
if (!isset($_SESSION['otp'])) {
    echo "Session expired. Please try again.";
    exit();
}

// Check if form is submitted for OTP verification
// Check if OTP is stored in session
if (isset($_POST['otp_submit'])) {
    $enteredOTP = $_POST['otp'];
    $storedOTP = $_SESSION['otp'];

    // Check if entered OTP matches the stored OTP
    if ($enteredOTP == $storedOTP) {
        // OTP matched, allow user to reset password
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'OTP Verified',
                    text: 'You can now reset your password.',
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        window.location.href = 'reset_password.php?email=" . urlencode($_GET['email']) . "';
                    }
                });
              </script>";
        exit();
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid OTP',
                    text: 'Please try again.'
                });
              </script>";
    }
}
?>