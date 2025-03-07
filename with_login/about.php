<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<?php
    include('../admin/db_connect.php');
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
      
  background-color:black;
  background-image: linear-gradient(180deg , gray, black);
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
  /* background-color:black; */
  /* background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%); */
      
      color: white;
      margin-top: 4%;
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
  
  

</body>
</html>