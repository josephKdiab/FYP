<?php
session_start();
if(!isset($_SESSION['EMAIL'])){
  header("Location:signin.php");
}
?>
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
<title>Profile</title>
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

  </nav>
<!-- header section end-->


<!-- Fill prfile form start--> 


<div class="container"  style="padding-top: 40px;">
 <div class="row">
   <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
     <div class="card card-signin my-5" style="background-color: rgba(172, 168, 168, 0.082); ">
      <div class="card-body">
       <div class="card-body">
         <h5 class="card-title text-center"  style="color: rgb(98, 107, 104); ">Your profile</h5>

    
    <form class="form-signin" method="post" action="profileauthentication.php">


      <div class="form-label-group">
      <label for="name">Name:</label>
      <input  class="form-control" type="text" name="name" id="name" required>
      </div>

      <div class="form-label-group">
      <label for="Lname">Last Name:</label>
      <input   class="form-control" type="text" name="Lname" id="Lname" required>
      </div>
      
    <!-- errorInDisplay--> 

      <div class="form-label-group">
        <label for="gender">Gender:</label>
        <input  class="form-control" type="radio" name="gender" value="male" id="male" required>
        <label for="male">Male</label>
        <input  class="form-control" type="radio" name="gender" value="female" id="female">
        <label for="female">Female</label>
      </div>


      <div class="form-label-group">
      <label for="location">Location:</label>
      <input  class="form-control" type="text" name="location" id="location" required>
      </div>

      <div class="form-label-group">     
      <label for="dob">Date of Birth:</label>
      <input  class="form-control" type="date" name="dob" id="dob" required>
      </div>

      <br>
      <style>
            .nav-link:hover {
              color: rgb(7, 190, 135)
            }
            </style>
          <div style="text-align: center;">
            
            <a  class="nav-link" href="register.php" style="font-size: 15px;">Next</a>
          </div>
          <hr class="my-4">

          
      <!-- Experience shouldn t be in the same form of the profile
      <label for="educations">Education:</label>
      <input type="text" name="education" id="education" required>
      <br><br>
      <label for="skills">Skills</label>
      <input type="text" name="skills" id="skills" required>
      <br><br>
      <input type="submit" name="submit" value="Submit">
    -->

      
    </form>
   

  </body>
</html>
