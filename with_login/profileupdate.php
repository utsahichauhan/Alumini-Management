<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
require_once "db_connect.php";

// Retrieve user's current profile information
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM logininfo_users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    <div class="container">
        <div class="signup-form">
            <h1>Edit Profile</h1>
            <form method="POST" action="../checkupdateotp.php" id="editProfileForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="input" id="name" name="name" value="<?php echo $user_data['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" placeholder="Enter Email Address" class="input" id="email" name="email" value="<?php echo $user_data['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="number" placeholder="Phone-No" class="input" id="phoneNumber" value="<?php echo $user_data['phone']; ?>" name="phone">
                </div>
                <div class="form-group">
                    <label for="work">Currently Working:</label>
                    <input type="text" placeholder="Currently Working" class="input" value="<?php echo $user_data['work']; ?>" id="work" name="work">
                </div>
                <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Function to show SweetAlert2 alert when form is submitted
        document.getElementById('editProfileForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Show animated alert indicating OTP has been generated
            Swal.fire({
                icon: 'success',
                title: 'OTP Generated',
                text: 'Please check your email for OTP.',
                timer: 1000, // Set timer to auto-close alert after 3 seconds
                showConfirmButton: false // Hide the "OK" button
            });

            // Submit the form after the alert is closed
            setTimeout(function() {
                document.getElementById('editProfileForm').submit();
            }, 3000); // Wait for 3 seconds before submitting the form
        });
    </script>
</body>

</html>
