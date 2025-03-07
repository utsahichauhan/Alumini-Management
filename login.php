<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!----------------- Bootstrap css files --------------->
    <link rel="stylesheet" href="css-files/bootstrap.min.css">
    <script src="js/jquery-3.7.1.js"></script>

    <!----------------- Javascript SDK --------------------->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> 
    <script src="javascript-files/amazon-cognito-auth.min.js"></script>
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.7.16.min.js"></script> 
    <script src="javascript-files/amazon-cognito-identity.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="javascript-files/config.js"></script>


    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <img src="images/2.jpg">
        <div class="container col-lg-4 col-md-5 col-sm-5 col-xs-10">
          <div class="signup">Login</div>
          <form  method = "POST">
          <div class="signup-form">
            <label for="type">Login as</label>
            <select name="type" class="input" required>
                <option>Alumni</option>
                <option>College</option>
                <option>Student</option>
            </select><br>
            <input type="text" placeholder="Enter the email" class="input" name="email" id="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>"><br>
            <input type="password" placeholder="Enter the Password" name="password" class="input" id="password"><br>
              <!-- <div class="btn" name="submit" id="login">log in</div>-->
              <button type="submit" class="btn" name="submit" id="login">Log In</button>
              <span><a href="register.php">Register </a></span><br>
              <span><a href="forget.php">I forgot my username or password.</a></span>
           </div>
        </form>
        </div>
      </div>
    <script>
        $(document).ready(function() {
            $("#login").click(function() {
                var email = $("#email").val();
                var password = $("#password").val();
                var regEx = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
                var validEmail = regEx.test(email);
                if (email=='') {
                    Swal.fire('Field is empty','Please enter your email address','warning');
                }
                else if(!validEmail){
                    Swal.fire('Invalid email format','Please check your email address and re-enter it','warning');
                }
                
                if (password == '') {
                    Swal.fire('Password field is empty','Please enter your password','warning');
                }
            });
        });
    </script>
    <script src="javascript-files/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="javascript-files/bootstrap.js"></script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "alumni_db");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data
    // Add your validation logic here...

    // Check if the email exists in the database
    $result = $conn->query("SELECT * FROM logininfo_users WHERE email = '$email'");
    if ($result->num_rows == 1) {
        // Email found, verify password
        $row = $result->fetch_assoc();
        $stored_password = $row['password_hash'];
        $_SESSION['user_id'] = $row['id'];
        if (password_verify($password, $stored_password)) {
            // Password matches, set session variables and redirect to dashboard
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];
            $_SESSION['type'] = $row['type'];
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Login Successfull',
                text: 'Welcome!',
                onClose: () => {
                    window.location.href = 'with_login/index.php';
                }
            });</script>";
            exit();
        } else {
            // Password doesn't match
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Incorrect password. Please try again.'
            });</script>";
        }
    } else {
        // Email not found
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Email not found. Please register first.'
        });</script>";
    }
    // Close database connection
    $conn->close();
}    
?>
