<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css-files/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <script src="js/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <img src="images/2.jpg">
        <div class="container col-lg-4 col-md-5 col-sm-5 col-xs-10">
            <div class="signup">Signup</div>
            <form method="POST" action="send_auth.php">
                <div class="signup-form">
                    <label for="type">Sign Up as</label>
                    <select name="type" class="input" id="user" required>
                        <option>Click Here</option>
                        <option>Alumni</option>
                        <option>College</option>
                        <option>Student</option>
                    </select><br>
                    <input type="text" placeholder="Enter Name" class="input" id="name" name="name" required><br>
                    <input type="text" placeholder="Enter Email Address" class="input" id="email" name="email" required><br>
                    <input type="number" placeholder="Phone-No" class="input" id="phoneNumber" name="phoneNumber" required><br>
                    <input type="text" placeholder="Currently Working" class="input" id="work" name="work" required><br>
                    <input type="password" placeholder="Choose a Password" class="input" id="password" name="password" required><br>
                    <input type="password" placeholder="Re-enter Password" class="input" id="confirm" name="confirm" required><br>
                    <button type="submit" class="btn" id="register">Create account</button>
                </div>
            </form>
        </div>
    </div>    
    <script>
        $(document).ready(function() {
            $('#registrationForm').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'register.php', // Change this to your PHP script file
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'OTP Generated and Sent',
                            text: 'Check the email!',
                            onClose: () => {
                                location.login(); // Refresh page after successful registration
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while registering. Please try again later.'
                        });
                    }
                });
            });
        });
    </script>
    
</body>
</html> 