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
        $conn = new mysqli("localhost", "root", "", "alumni_db");
        $registration_details = $_SESSION['registration_details'];

        // Now you can access individual elements of the array like this
        $type = $registration_details['type'];
        $name = $registration_details['name'];
        $email = $registration_details['email'];
        $password = $registration_details['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $phone = $registration_details['phoneNumber'];
        $work = $registration_details['work'];

        // You can use these variables wherever needed in your HTML
        // Validate form data
        // Add your validation logic here...

        // Check if the email already exists in the database
        $result = $conn->query("SELECT * FROM logininfo_users WHERE email = '$email'");
        if ($result->num_rows > 0) {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Email is already existing'
            });</script>";
        } else {
            // Prepare SQL statement to prevent SQL injection
            $sql = $conn->prepare("INSERT INTO logininfo_users (type, name, email, password_hash, work, phone) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssss", $type, $name, $email, $hashed_password, $work, $phone);

            // Execute SQL query
            if ($sql->execute()) {
                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Welcome',
                    text: 'Registration Successfull',
                    onClose: () => {
                        window.location.href = 'login.php?email=" . urlencode($_GET['email']) . "';
                    }
                });</script>";
            } else {
                // Display error message if insertion fails
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to insert data: " . $conn->error . "'
                });</script>";
            }

            // Close prepared statement
            $sql->close();
            $conn->close();
        }

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

