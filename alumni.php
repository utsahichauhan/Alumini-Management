<!DOCTYPE html>
<html lang="en">
  
<?php session_start(); ?>
    <link rel="stylesheet" href="style.css" />
    <title><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body>

	<?php
          include 'db_connect.php';
    ?>
      
      <br><br>
   <div class="container-fluid">
<style>
    .card:hover {
        transform: scale();
        z-index: 1; /* Ensure the zoomed card is on top */
        box-shadow: 0 0 80px rgba(239, 221, 221, 0.3); /* Add a shadow effect */
      }
    
    #portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.alumni-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}
.alumni-img {
    width: calc(30%);
    max-height: 30vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.alumni-list .card-body{
    width: calc(70%);
}
.alumni-img img {
    border-radius: 100%;
    max-height: calc(100%);
    max-width: calc(100%);
}
span.hightlight{
    background: yellow;
}
.carousel,.carousel-inner,.carousel-item{
   min-height: calc(100%)
}
header.masthead,header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }
.row-items{
    position: relative;
}
.card-left{
    left:0;
}
.card-right{
    right:0;
}
.rtl{
    direction: rtl ;
}
.alumni-text{
    justify-content: center;
    align-items: center ;
}
.masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }
.alumni-list p {
	margin:unset;
}
.search{
    margin:30px;
}
form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }
  
  /* Style the submit button */
  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none; /* Prevent double borders */
    cursor: pointer;
  }
  
  form.example button:hover {
    background: #0b7dda;
  }
  
  /* Clear floats */
  form.example::after {
    content: "";
    clear: both;
    display: table;
  }
</style>
<nav class="fixed-top">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">ALUMNI MANAGEMENT</label>
    <ul>
      <li><a  href="index.php">Home</a></li>
      <li><a class="active" href="alumni.php">Alumni</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
</nav>

                <div class="search">
                    <form class="example" action="#">
                        <input type="text" placeholder="Search alumni with names" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                      </form>
                 </div>
        <div class="alumni">
            
        <div class="container-fluid mt-3 pt-2">
               
               <div class="row-items">
               <div class="col-lg-12">
                   <div class="row">
               <?php
               $fpath = 'admin/assets/uploads';
               $alumni = $conn->query("SELECT * from logininfo_users");
               while($row = $alumni->fetch_assoc()):
               ?>
               <div class="col-md-4 item">
               <div class="card alumni-list" data-id="<?php echo $row['id'] ?>">
                       <div class="alumni-img" card-img-top>

                           <img src="images/user.jpeg" alt="">
                       </div>
                   <div class="card-body">
                       <div class="row align-items-center h-100">
                           <div class="">
                               <div>
                               <p class="filter-txt"><b><?php echo $row['name'] ?></b></p>
                               <hr class="divider w-100" style="max-width: calc(100%)">
                               <p class="filter-txt">Email: <b><?php echo $row['email'] ?></b></p>
                               <p class="filter-txt">Phone no: <b><?php echo $row['phone'] ?></b></p>
                               <p class="filter-txt">Currently working in/as <b><?php echo $row['work'] ?></b></p>
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

<script>
    // $('.card.alumni-list').click(function(){
    //     location.href = "index.php?page=view_alumni&id="+$(this).attr('data-id')
    // })
    $('.book-alumni').click(function(){
        uni_modal("Submit Booking Request","booking.php?alumni_id="+$(this).attr('data-id'))
    })
    $('.alumni-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })
     $('#filter').keypress(function(e){
    if(e.which == 13)
        $('#search').trigger('click')
   })
    $('#search').click(function(){
        var txt = $('#filter').val()
        start_load()
        if(txt == ''){
        $('.item').show()
        end_load()
        return false;
        }
        $('.item').each(function(){
            var content = "";
            $(this).find(".filter-txt").each(function(){
                content += ' '+$(this).text()
            })
            if((content.toLowerCase()).includes(txt.toLowerCase()) == true){
                $(this).toggle(true)
            }else{
                $(this).toggle(false)
            }
        })
        end_load()
    })

</script>

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