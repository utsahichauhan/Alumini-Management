<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/scripts.js"></script>
  <script src="js/jquery-3.7.1.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="icon" type="image/x-icon" href="/images/1.ico">
</head>

<body>
    <style>
        .upcominevents {
            overflow: hidden;
          }
      
          .upcominevents h3 {
            animation: marquee 10s linear infinite;
          }
      
          @keyframes marquee {
            0% {
              transform: translateX(100%);
            }
      
            100% {
              transform: translateX(-100%);
            }
          }
    </style>
  <nav class="fixed-top">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">ALUMNI MANAGEMENT</label>
    <ul>
      <li><a class="active" href="index.php">Home</a></li>
      <li><a href="alumni.php">Alumni</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="#"><?php echo $_SESSION['name']?> <img src="Profile-img/images/user.jpeg" class="user-pic" onclick="toggleMenu(event)"></a></li>
    </ul>
    <div class="sub-menu-wrap" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
          <img src="Profile-img/images/user.jpeg">
          <h3><?php echo $_SESSION['name']?></h3>
        </div>
        <hr>

        <a href="profileupdate.php" class="sub-menu-link">
          <img src="Profile-img/images/profile.png">
          <p>Edit profile</p>
          <span></span>
        </a>

        <a href="#" class="sub-menu-link">
          <img src="Profile-img/images/setting.png">
          <p>Settings &amp; Privacy</p>
          <span></span>
        </a>

        <a href="contactus.html" class="sub-menu-link">
          <img src="Profile-img/images/help.png">
          <p>Help &amp; support</p>
          <span></span>
        </a>

        <a href="logut.php" class="sub-menu-link">
          <img src="Profile-img/images/logout.png">
          <p>Logut</p>
          <span></span>
        </a>
      </div>
    </div>
  </nav>
</nav>
<style>/* Style the form */
         
    .form{
      margin: 40px;
    }
    body{
      background-color: black;
      background-image: linear-gradient(90deg,gray,black);
    }

    </style>
    <div class="form">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">How Can I Help You Please Contact Us </h3>
                                <form id="registrationForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="firstName" class="form-control form-control-lg" name="firstName" placeholder="First Name"  />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="lastName" class="form-control form-control-lg" name="lastName" placeholder="Last Name"  />
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="text" id="emailAddress" class="form-control form-control-lg" name="emailAddress" placeholder="Email"  />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="text" id="phoneNumber" class="form-control form-control-lg" name="phoneNumber" placeholder="Write Message"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <input id="register" class="btn btn-primary btn-lg" type="submit" value="Send" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $("#register").click(function() {
                var name = $("#firstName").val();
                var email = $("#emailAddress").val();
                var phone = $("#phoneNumber").val();
                var sub = $("#subject").val();
                
                if (name == '') {
                    alert("Please fill name field...!!!!!!");
                } 
                
                if (email=='') {
                  alert("Please fill email field...!!!!!!");
                }
                else{
                  var regEx = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
                  var validEmail = regEx.test(email);
                  if(!validEmail)
                  {
                      alert('Invalid Email Address');
                  }
                }
              
                if (phone == '') {
                    alert("Please fill Meassage field...!!!!!!");
                }
                
                 else {
                        alert("Send Message successfully");
                    
                }
            });
        });
    </script>
</body>

</html>