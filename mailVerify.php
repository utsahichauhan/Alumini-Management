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
if (isset($_POST['otp_submit'])) {
    $enteredOTP = $_POST['otp'];
    $storedOTP = $_SESSION['otp'];
    // Check if entered OTP matches the stored OTP
    if ($enteredOTP == $storedOTP) {
        // OTP matched, allow user to reset password
        $conn = new mysqli("localhost", "root", "", "alumni_db");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Check if the session variable is set
        if (isset($_SESSION['cred'])) {
            // Access the array
            $update_cred = $_SESSION['cred'];
            $user_id = $_SESSION['user_id'];

            // Prepare and bind SQL statement to prevent SQL injection
            $update_sql = $conn->prepare("UPDATE logininfo_users SET name = ?, email = ?, phone = ?, work = ? WHERE id = ?");
            $update_sql->bind_param("ssssi", $update_cred['name'], $update_cred['email'], $update_cred['phone'], $update_cred['work'], $user_id);

            // Execute the update statement
            if ($update_sql->execute()) {
                // Profile updated successfully
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Updation Successfull',
                    text: '',
                    onClose: () => {
                        window.location.href = 'with_login/index.php';
                    }
                });
                </script>";
            } else {
                // Error updating profile
                echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Updation unsuccessfull',
                    text: '',
                    onClose: () => {
                        window.location.href = 'with_login/index.php';
                    }
                });
                </script>";
            }
        
            // Close prepared statement
            $update_sql->close();

        }

        // Close database connection
        $conn->close();
    }
}
?>
