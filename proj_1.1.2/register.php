<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>talentTeck</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesoeet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<body>
	<!-- header section start-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="logo" href="general.php"><img src="images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               
               <style>
                .nav-link:hover {
                  color: rgb(7, 190, 135)
                }
              </style>  
              <li class="nav-item">
                <a class="nav-link" href="general.php">Home</a>
             </li>             
                   <a class="nav-link" href="login.php">Sign in</a>
                  </li>
                  <li class="nav-item">
                <li class="nav-item">
                   <a class="nav-link" href="#">About us</a>
                </li>
			
    
    </nav>
	<!-- header section start-->

	
 <!-- login section start-->  

  <div class="container"  style="padding-top: 70px;">
 <div class="row">
   <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
     <div class="card card-signin my-5" style="background-color: rgba(172, 168, 168, 0.082); ">
      <div class="card-body">
       <div class="card-body">
         <h5 class="card-title text-center"  style="color: rgb(98, 107, 104); ">Create account</h5>


          <!-- Begin form--> 
         <form class="form-signin" method="post" action="insert.php">
           <div class="form-label-group">
             <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
             <label for="inputEmail">Email address</label>
           </div>

           
           <style>
            .match-error {
              color: red;
            }
          
            .match-success {
              color: rgb(0, 255, 0);
            }
          </style>
          
          <div class="form-label-group">
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
          </div>
          
          <div class="form-label-group">
            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
            <label for="confirmPassword">Confirm password</label>
            <span id="passwordMatch" style="font-weight: bold;"></span>
          </div>
          <br>
          
          
          <button id="signupButton" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: rgb(7, 190, 135);" disabled>Sign Up</button>
       
          
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
            $(document).ready(function() {
              var signupButton = $('#signupButton');
              var passwordMatchElement = $('#passwordMatch');
          
              $('#inputPassword, #confirmPassword').on('input', function() {
                var password = $('#inputPassword').val();
                var confirmPassword = $('#confirmPassword').val();
          
                if (password !== confirmPassword) {
                  passwordMatchElement.text('*');
                  passwordMatchElement.removeClass('match-success').addClass('match-error');
                  signupButton.prop('disabled', true);
                } else {
                  passwordMatchElement.text('*');
                  passwordMatchElement.removeClass('match-error').addClass('match-success');
                  signupButton.prop('disabled', false);
                }
              });
            });
          </script>
          

          <br>
           
          <style>
            .nav-link:hover {
              color: rgb(7, 190, 135)
            }
            </style>
          <div style="text-align: center;">
            
            <a  class="nav-link" href="login.php">already have an account?</a>
          </div>
          <hr class="my-4">

         </form>
       </div>
     </div>
   </div>
 </div>
</div>
</div>


    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
      $(document).ready(function(){
      $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         </script>

	
     
</body>
</html>