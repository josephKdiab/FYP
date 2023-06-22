<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {
  header("Location: signin.php");
}

include 'connection.php';

$query = "SELECT * FROM `individual_profile` WHERE `EMAIL`='" . $_SESSION['EMAIL'] . "'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);



?>


<!DOCTYPE html>
<html lang="en">

<style>
  .profile-container {
    position: absolute;
    top: 100px;
    left: -520px;
  }

  .profile-panel {
    width: 250px;
    height: 500px;
    border-radius: 20px;
    overflow: hidden;
    background-color: #f2f2f2;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
  }

  .profile-image {
    width: 140px;
    height: 140px;
    object-fit: cover;
    margin-top: 10px;
    border-radius: 50%;
  }

  .profile-name {
    margin-top: 20px;
  }

  .image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 10px;
  }

  .file-label {
    color: #87CEFA;
  }

  .bg-light {
    background-color: #f2f2f2;
  }

  .about-container {
    top: 200px;
    right: 300px;   
  }

  .about-panel {
    width: 250px;
    height: 200px;
    border-radius: 20px;
    overflow: hidden;
    background-color: #f2f2f2;
    padding: 100px;
  }

  .about-heading {
    font-weight: bold;
    margin-bottom: 10px;
  }

  .about-info {
    margin-bottom: 0; /* Remove the bottom margin */
  }

  .about-info strong {
    display: inline-block;
    width: 100px;
  }

  .card-header {
    position: absolute;
    top: 0;
    right: 10px;
    padding-left: 100px;
    background-color: #f2f2f2;
  }
</style>

<head>
  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Site Metas -->
  <title>talentTeck</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- Favicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <!-- Fancybox -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>

<body>
  <!-- Header Section -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo" href="index.php"><img ahref="index.php" src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search jobs.html">YOUR NETWORK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recurments.html">JOBS</a>
        </li>
        <li class="nav-item">
          <a href="myProfile.php" class="nav-link">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Settings</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Header Section End -->

  <!-- Profile Pic Display Section -->
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">About</div>
          <div class="panel-body" style="padding-left: 0;"> <!-- Remove padding from left -->
            <p><strong>Name: </strong><?php echo $row['Name'] . " " . $row['last_name']; ?></p>
            <p><strong>Date of Birth: </strong><?php echo $row['Date-of-birth']; ?></p>
            <p><strong>Email: </strong><?php echo $row['Email']; ?></p>
            <p><strong>Location: </strong><?php echo $row['Location']; ?></p>
            <p><strong>Gender: </strong><?php echo $row['Gender']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Profile Picture Section -->
        <div class="profile-container">
          <div class="profile-panel">
            <h3 class="profile-name"><?php echo $row['Name'] . " " . $row['last_name']; ?></h3>
            <div class="image-container">
              <img class="profile-image" src="profile_pic/<?php echo $row['picture']; ?>" alt="Profile Picture">
              <form method="POST" action="profilePIC.php" enctype="multipart/form-data">
                <br>
                <label for="pp" class="file-label">Change picture</label>
                <input type="file" name="pp" id="pp" accept="image/*" style="display: none;">
                <br>
                <button type="submit" name="submitp" class="edit-button" style="color: #87CEFA;">Edit</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Profile Picture Section End -->
      </div>
    </div>
  </div>
  <!-- Profile Pic Display Section End -->

  <!-- Footer Section -->
  <!-- Add your footer code here -->
  <!-- Footer Section End -->

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Owl Carousel -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- Fancybox -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <!-- Custom Script -->
  <script src="js/custom.js"></script>
</body>

</html>
