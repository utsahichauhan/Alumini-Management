<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="path/to/sweetalert2.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Display a sweet alert thanking the user
        Swal.fire({
            icon: 'success',
            title: 'Logged out successfully!',
            text: 'Thank you for visiting. See you next time!',
            timer: 3000, // Auto close the alert after 3 seconds
            timerProgressBar: true,
            onClose: () => {
                window.location.href = '../index.php'; // Redirect to the home page
            }
        });
    </script>
</body>
</html>
