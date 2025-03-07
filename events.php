<!DOCTYPE html>
<html lang="en">
    <head>
      
<?php session_start(); ?>
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
	<?php include 'navbar.php' ?>
            
        <section class="page-section">
          <div class="container">
            <div class="card">
              <div class="image">
                <img class="img-fluid" src="images/1.png" alt="Image 1">
              </div>
              <div class="content">
                <h3>This is content</h3>
                <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>
              </div>
            </div>  
            <div class="card">
              <div class="image">
                <img class="img-fluid" src="images/1.png" alt="Image 1">
              </div>
              <div class="content">
                <h3>This is content</h3>
                <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>
              </div>
            </div>
          </div>
        </section>
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
        
<style>
  .container {
    display : flex;
    align-items : center;
    justify-content : center;  
    background-color: black;
    min-height : 800px;
  }
  .container {
    position : relative;
    width : 1100px;
    display : flex;
    align-items : center;
    justify-content : center;
    flex-warp : warp;
    padding : 30px;  
  }
  
  .container .card {
    position: relative;
    max-width : 300px;
    height : 215px;  
    background-color : #fff;
    margin : 30px 10px;
    padding : 20px 15px;
    
    display : flex;
    flex-direction : column;
    box-shadow : 0 5px 20px rgba(0,0,0,0.5);
    transition : 0.3s ease-in-out;
    border-radius : 15px;
  }
  .container .card:hover {
    height : 320px;    
  }
  
  
  .container .card .image {
    position : relative;
    width : 260px;
    height : 260px;
    
    top : -40%;
    left: 8px;
    box-shadow : 0 5px 20px rgba(0,0,0,0.2);
    z-index : 1;
  }
  
  .container .card .image img-fluid {
    max-width : 50%;
    border-radius : 15px;
  }
  
  .container .card .content {
    position : relative;
    top : -140px;
    padding : 10px 15px;
    color : #111;
    text-align : center;
    
    visibility : hidden;
    opacity : 0;
    transition : 0.3s ease-in-out;
      
  }
  
  .container .card:hover .content {
     margin-top : 30px;
     visibility : visible;
     opacity : 1;
     transition-delay: 0.2s;
    
  }
      /* Add CSS for responsiveness */
      .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }
  
      .card {
        width: calc(50% - 20px); /* Adjust card width as per your requirement */
        margin-bottom: 20px;
      }
  
      .image img {
        max-width: 100%;
        height: auto;
      }
  
      @media (max-width: 768px) {
        .card {
          width: 100%;
        }
      }
</style>
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