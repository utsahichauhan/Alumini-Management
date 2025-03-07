<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

<?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    ?>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/scripts.js"></script>
  <script src="js/jquery-3.7.1.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="icon" type="image/x-icon" href="/images/1.ico">
</head>

<body>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
  background-color:#1c1c1c;
    }
    
    html {
      box-sizing: border-box;
    }
    
    *, *:before, *:after {
      box-sizing: inherit;
    }
    
    .column {
      float: left;
      width: 33.3%;
      margin-bottom: 16px;
      padding: 0 8px;
    }
    
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: 8px;
    }
    
    .about-section {
      padding: 50px;
      text-align: center;  
  /* background-color:#1c1c1c; */
  /* background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%); */
      color: white;
      /* margin-top: 4%; */
    }
    
    .container {
      padding: 0 16px;
    }
    
    .container::after, .row::after {
      content: "";
      clear: both;
      display: table;
    }
    
    .title {
      color: grey;
    }
    
    .button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
    }
    
    .button:hover {
      background-color: #555;
    }
    
    @media screen and (max-width: 650px) {
      .column {
        width: 100%;
        display: block;
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
      <li><a href="index.php">Home</a></li>
      <li><a href="alumni.php">Alumni</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a class="active" href="about.php">About</a></li>
     <li><a href="login.php">Login</a></li>
    </ul>
  </nav>
  <div class="about-section">
    
  <div class="stars">
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
  </div>
    <h1>Welcome To Alumni Management</h1>
    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>

<h1 style="text-align:center">Our Team</h1>
  </div>
  
  <div class="row">
    <div class="column">
      <div class="card">
      <center><img src="images/utsahi.jpg" alt="Jane" style="width:50%"></center> 
        <div class="container">
          <h2>Jane Doe</h2>
          <p class="title">CEO & Founder</p>
          <p></p>
          <p>jane@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
       <center><img src="images/krushal.jpg" alt="Mike" style="width:50%"></center> 
        <div class="container">
          <h2>Mike Ross</h2>
          <p class="title">Art Director</p>
          <p></p>
          <p>mike@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    
    <div class="column">
      <div class="card">
        <center><img src="images/krisha.png" alt="John" style="width:50%"></center>
        <div class="container">
          <h2>John Doe</h2>
          <p class="title">Designer</p>
          <p></p>
          <p>john@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- login form section -->
  <form id="emailForm">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="email" name="email">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <div id="badge-alert"></div>
          </div>
          <a href="register.html">Click for Register</a>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>

</body>

<script>
  $(document).ready(function () {
    $('#register').click(function(e) {
        e.preventDefault();  //prevent default submit
        var email = $('#email').val();
        var password = $('#floatingPassword').val();
        $(".error").remove();
        var regEx = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
        var validEmail = regEx.test(email);
        if (email=='') {
          alert("Please fill email field...!!!!!!");
         }
      else if(!validEmail){
              alert('Invalid Email Address');
      }
      
      else if (password == '') {
          alert("Please fill password field...!!!!!!");
      }
       else {
            alert("login successfully");
        }
    });
});
</script>
</html>