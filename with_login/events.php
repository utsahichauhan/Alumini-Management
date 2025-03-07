<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <title><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="js/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="/images/1.ico">
</head>

<body>
    
	<?php 
    include 'db_connect.php';
    ?>
    <nav class="fixed-top">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ALUMNI MANAGEMENT</label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="alumni.php">Alumni</a></li>
            <li><a  href="gallery.php">Gallery</a></li>
            <li><a class="active" href="events.php">Events</a></li>
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


    <style>
        #portfolio .img-fluid {
            width: calc(100%);
            height: 30vh;
            z-index: -1;
            position: relative;
            padding: 1em;
        }

        .gallery-list {
            cursor: pointer;
            border: unset;
            flex-direction: inherit;
        }

        .gallery-img,
        .gallery-list .card-body {
            width: calc(50%)
        }

        .gallery-img img {
            border-radius: 5px;
            min-height: 50vh;
            max-width: calc(100%);
        }

        span.hightlight {
            background: yellow;
        }

        .carousel,
        .carousel-inner,
        .carousel-item {
            min-height: calc(100%)
        }

        header.masthead,
        header.masthead:before {
            min-height: 50vh !important;
            height: 50vh !important
        }

        .row-items {
            position: relative;
        }

        .card-left {
            left: 0;
        }

        .card-right {
            right: 0;
        }

        .rtl {
            direction: rtl;
        }

        .gallery-text {
            justify-content: center;
            align-items: center;
        }

        .masthead {
            min-height: 23vh !important;
            height: 23vh !important;
        }

        .masthead:before {
            min-height: 23vh !important;
            height: 23vh !important;
        }

        .content:hover {
            transform: scale(1.0);
            z-index: 1;
            /* Ensure the zoomed card is on top */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            /* Add a shadow effect */
        }

        .gallery {
            margin-top: 70px;
        }
    </style>
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
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
      </div>
      <div class="gallery">
        
        <div class="container-fluid mt-3 pt-2">
                   
                   <div class="row-items">
                   <div class="col-lg-12">
                       <div class="row">
                   <?php
                   $rtl ='rtl';
                   $ci= 0;
                   $gallery = $conn->query("SELECT * FROM events ORDER BY id DESC");
                   while($row = $gallery->fetch_assoc()):
                      
                       $ci++;
                       if($ci < 3){
                           $rtl = '';
                       }else{
                           $rtl = 'rtl';
                       }
                       if($ci == 4){
                           $ci = 0;
                       }
                    
                       // Fetch the image filename from the database
                       $image_filename = $row['banner'];
                       // Construct the path to the image
                       $image_path = '../admin/images/';
                       // Check if the image file exists
                       $image_src = $image_path . $image_filename;
                       
                   ?>
                   <div class="col-md-6">
                   <div class="card gallery-list <?php echo $rtl ?>" data-id="<?php echo $row['id'] ?>">
                           <div class="gallery-img" card-img-top>
    
                               <img src="<?php echo $image_src ?>" alt="">
                           </div>
                       <div class="card-body">
                           <div class="row align-items-center justify-content-center text-center h-100">
                               <div class="">
                                   <div>
                                   <span class="truncate" style="font-size: inherit;"><small><?php echo ucwords($row['content']) ?></small></span>
                                       <br>
                                   </div>
                               </div>
                           </div>
                           
    
                       </div>
                   </div>
                   <br>
                   </div>
                   <?php endwhile; ?>
                   </div>
                   </div>
                   </div>
               </div>
        </div>


</body>

</html>
