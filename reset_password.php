<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css-files/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="login.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <div class="wrapper">
        <img src="images/2.jpg">
        <div class="container col-lg-4 col-md-5 col-sm-5 col-xs-10">
            <div class="signup">Reset Password</div>
            <div class="signup-form">
                <form method="post">
                    <label for="password">New Password</label>
                    <input type="password" placeholder="Enter New Password" class="input" id="password" name="password" required><br>
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" placeholder="Confirm New Password" class="input" id="confirm_password" name="confirm_password" required><br>
                    <button type="submit" class="btn" name="reset_submit">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
session_start();

// Check if email is provided in URL
if (!isset($_GET['email'])) {
    echo "Email not provided.";
    exit();
}

// Check if form is submitted for password reset
if (isset($_POST['reset_submit'])) {
    // Validate and process password reset
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Passwords do not match',
                    text: 'Please make sure your passwords match.'
                });
              </script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Connect to the database
        $pdo = new PDO('mysql:host=localhost;dbname=alumni_db', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to update the password
        $stmt = $pdo->prepare("UPDATE logininfo_users SET password_hash = :spassword WHERE email = :email");
        $stmt->bindParam(':spassword', $hashed_password);
        $stmt->bindParam(':email', $_GET['email']);
        $stmt->execute();

        // Check if any rows were affected
        if ($stmt->rowCount() > 0) {
            // Password updated successfully
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Updated',
                        text: 'Your password has been updated successfully.',
                        showConfirmButton: false,
                        timer: 2000,
                        onClose: () => {
                            window.location.href = 'login.php';
                        }
                    });
                  </script>";
            exit();
        } else {
            // No rows affected (email not found)
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Email not found. Please try again.'
                    });
                  </script>";
        }
    } catch(PDOException $e) {
        // Handle database errors
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Database Error',
                    text: 'An error occurred while updating your password. Please try again later.'
                });
              </script>";
    }
}
?>