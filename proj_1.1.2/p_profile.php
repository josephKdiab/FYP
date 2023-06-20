<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {
  header("Location: signin.php");
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

  <style>
    .animate-paragraph {
      opacity: 0;
      transform: translateX(-50px);
      animation: slideInLeft 1s ease forwards;
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
  </style>
</head>

<body>

  <!-- header section start-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo"><img src="images/logo.png"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      </ul>
    </div>
  </nav>
  <!-- header section end-->

  <!-- Introduction paragraph -->
  <div class="container" style="padding-top: 40px;">
    <div class="row">
      <div class="col-md-5">
        <p class="animate-paragraph" style="padding-top: 100px; padding-right: 100px; font-size: 20px;">Enhance your professional profile and expand your network by filling out your professional information. Showcase your expertise, attract connections, and unlock exciting career opportunities.</p>
      </div>
      <div class="col-md-7">


<!-- Fill profile form start-->

        <div class="card card-signin my-5" style="background-color: rgba(172, 168, 168, 0.082);">
          <div class="card-body">
            <h5 class="card-title text-center" style="color: rgb(98, 107, 104);">professional information</h5>
            <form class="form-signin" method="post" action="profileauthentication.php">
              <div class="form-label-group">
                <label for="name">Education:</label>
                <input class="form-control" type="text" name="name" id="name" required>
              </div>
              <div class="form-label-group">
                <label for="Lname">studied at:</label>
                <input class="form-control" type="text" name="Lname" id="Lname" >
              </div>
              <div class="form-label-group">
                <label for="status">Status:</label>
                <input class="form-control" type="radio" name="Status" value="student" id="student" required>
                <label for="student">Student</label>
                <input class="form-control" type="radio" name="employed" value="employed" id="employed">
                <label for="employed">Employed</label>
                <input class="form-control" type="radio" name="Status" value="self-employed" id="self-employed" required>
                <label for="self-employed">Self-employed</label>
                <input class="form-control" type="radio" name="Status" value="other" id="other" required>
                <label for="other">Other</label>               
              </div>
              <div class="form-label-group">
                <label for="location">Certefications:</label>
                <input class="form-control" type="text" name="location" id="location" required>
              </div>
              <div class="form-label-group">
                <label for="dob">Skills:</label>
                <input class="form-control" type="date" name="dob" id="dob" required>
              </div>
              <div class="form-label-group">
                <label for="dob">Work experience:</label>
                <input class="form-control" type="date" name="dob" id="dob" required>
              </div>
              <br>
              <style>
                .nav-link:hover {
                  color: rgb(7, 190, 135)
                }
              </style>
              <div style="text-align: center;">
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" style="background-color: rgb(7, 190, 135);">Next</button>
              </div>
              <hr class="my-4">
            </form>
          </div>
        </div>

<!-- Fill profile form end -->
      </div>
    </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.animate-paragraph').addClass('animate');
    });
  </script>

</body>

</html>
