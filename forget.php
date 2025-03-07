<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
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
            <div class="signup">Forget Password</div>
            <div class="signup-form">
                <form method="post" action="send_otp.php">
                    <label for="email">Enter Email Address</label>
                    <input type="text" placeholder="Enter Email Address" class="input" id="email" name="email" required><br>
                    <button type="submit" class="btn" name="email_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
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
                  Swal.fire('Invalid Email ID', 'Please check your email address and try again','error');
                }
                
                if (password == '') {
                    Swal.fire("Password can not be Empty","Please Enter Your Password","warning");
                }
            });
        });
    </script>
</html>