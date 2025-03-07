<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css-files/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="jquery.validate.js"></script>
  
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <img src="images/2.jpg">
        <div class="container col-lg-4 col-md-5 col-sm-5 col-xs-10">
            <div class="signup">Signup</div>
            <form method="post" id="form1" action="register.php">
                <div class="signup-form">
                    <label for="type">Sign Up as</label>
                    <select name="type" class="input" id="user">
                        <option>Click Here</option>
                        <option>Alumni</option>
                        <option>College</option>
                        <option>Student</option>
                    </select><br>
                    <input type="text" placeholder="Enter Name" class="input" id="name" name="name"><br>
                    <p class="error" id="fn_err"> </p>
                    <input type="text" placeholder="Enter Email Address" class="input" id="email" name="email"><br>
                    <p class="error" id="em_err"> </p>
                    <input type="number" placeholder="Phone-No" class="input" id="phoneNumber" name="phoneNumber"><br>
                    <p class="error" id="pn_err"> </p>
                    <input type="text" placeholder="Currently Working" class="input" id="work" name="work"><br>
                    <p class="error" id="w_err"> </p>
                    <input type="password" placeholder="Choose a Password" class="input" id="password"
                        name="password"><br>
                    <p class="error" id="pswd_err"> </p>
                    <input type="password" placeholder="Re-enter Password" class="input" id="confirm"
                        name="confirm"><br>
                    <p class="error" id="c_err"> </p>
                    <input type="submit" class="btn" id="register">
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.validator.addMethod("fnregex", function (value, element) {
                reg12 = /^[a-zA-Z]+$/;
                return reg12.test(value);
            }, "Fullname must contain only letters");

            $.validator.addMethod("emregex", function (value, element) {
                reg12 = /^[a-zA-Z0-9.-_]+@[A-Za-z]+\.[a-zA-Z.]{2,3}$/;
                return reg12.test(value);
            }, "Invalid Email Address");

            $.validator.addMethod("pwdregex", function (value, element) {
                regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
                return this.optional(element) || regex.test(value);
            },
                "Password must contain atleast one uppercase letter, one lowercase letter, one digit and a special character"
            );

            $.validator.addMethod("mobregex", function (value, element) {
                regex = /^[0-9]{10}$/;
                return this.optional(element) || regex.test(value);
            }, "Mobile number must contain exactly 10 digits");

            $.validator.addMethod("filesize", function (value, element, size) {
                var maxSize = size * 1024 * 1024;
                for (var i = 0; i < element.files.length; i++) {
                    var fileSize = element.files[i].size;
                    if (fileSize > maxSize) {
                        return false;
                    }
                }
                return true; // File size is within the maximum limit
            }, "File size cannot exceed {0} MB.");

            $('#form1').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        maxlength: 35,
                        fnregex: true
                    },
                    email: {
                        required: true,
                        emregex: true
                    },
                    phoneNumber: {
                        required: true,
                        mobregex: true,
                        minlength: 10
                    },
                    work: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pwdregex: true
                    },
                    confirm: {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {
                    name: {
                        required: "Please enter Fullname",
                        minlength: "Fullname must contain atleast 2 characters",
                        maxlength: "fullname cannot be greater than 35 characters"
                    },
                    email: {
                        required: "Please enter Email address"
                    },
                    phoneNumber: {
                        required: "Please enter PhoneNumber",
                        minlength: "Please enter 10 digits"
                    },
                    work: {
                        required: "Please enter details"
                    },
                    password: {
                        required: "Please enter Password",
                        minlength: "Password must contain at least 8 characters",
                        maxlength: "Password must not be more than 20 characters"
                    },
                    confirm: {
                        required: "Please enter Confirm Password",
                        equalTo: "Confirm Password must be Same as Password"
                    }
                },
                errorPlacment: function (error, element) {
                    if (element.attr('name') == "name") {
                        $('#fn_err').html(error);
                    }
                    if (element.attr('name') == "email") {
                        $('#em_err').html(error);
                    }
                    if (element.attr('name') == "password") {
                        $('#pswd_err').html(error);
                    }
                    if (element.attr('name') == "phoneNumber") {
                        $('#pn_err').html(error);
                    }
                    if (element.attr('name') == "work") {
                        $('#w_err').html(error);
                    }
                    if (element.attr('name') == "confirm") {
                        $('#c_err').html(error);
                    }
                }
            });
        });
    </script>
</body>

</html>