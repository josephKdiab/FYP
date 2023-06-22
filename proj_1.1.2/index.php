
<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {
  header("Location: signin.php");
}

include 'connection.php';

$query = "SELECT * FROM `individual_profile` WHERE `Email`='" . $_SESSION['EMAIL'] . "'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);



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
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  
</head>

<body>


  <!-- header section start-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo" href="#"><img src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="search jobs.html">YOUR NETWORK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recurments.html">JOBS</a>
        </li>
        <li class="nav-item">
          <a href="myProfile.php" class="nav-link" >PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Settings</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- header section start end-->



  <!-- profile pic display -->
  <style>
  .profile-container {
    position: absolute;
    top: 160px;
    left: 40px;
  }

  .profile-panel {
    width: 250px; /* Increase the width of the panel */
    height: 500px; /* Increase the height of the panel */
    border-radius: 20px;
    overflow: hidden;
    background-color: #f2f2f2; /* Set a lighter color for the background */
    display: flex;
    flex-direction: column; /* Align items vertically */
    justify-content: flex-start; /* Align items to the top */
    align-items: center;
  }

  .profile-image {
    width: 140px; /* Keep the original width of the profile picture */
    height: 140px; /* Keep the original height of the profile picture */
    object-fit: cover;
    margin-top: px; /* Add some top margin to center the image */
    border-radius: 50%; /* Make the image circular */
  }

  .profile-name {
    margin-top: 20px; /* Add some top margin to lower the name */
  }
  
  .image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 10px; /* Add top margin to create space between the image and label */
  }

  .file-label {
    color: #87CEFA;
  }

  .circular-profile-pic {
  width: 50px; /* Set the desired width */
  height: 50px; /* Set the desired height */
  border-radius: 50%;
}

  .profile-picture {
    position: absolute;
    top: 4px;
    left: 10px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
  }

  .profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .card-header {
    position: relative;
    padding-left: 60px; /* Adjust the value as needed */
  }
  
  .post-info {
    margin-left: 20px; /* Adjust the value as needed */
  }

  .bg-light {
 background-color: #f2f2f2;
}
.image-container {
  text-align: center;
}

</style>




<div class="profile-container">
  <div class="profile-panel">
    <h3 class="profile-name"><?php echo $row['Name'] . " " . $row['last_name']; ?></h3>
    <?php
    ?>
    <div class="image-container">
      <img class="profile-image" src="profile_pic\<?php echo $row['picture']; ?>" alt="Profile Picture">
      
      <!-- Input field for uploading picture -->
      <form method="POST" action="profilePIC.php" enctype="multipart/form-data">
        <br>
        <label for="pp" class="file-label">Change picture</label>
        <input type="file" name="pp" id="pp" accept="image/*" style="display: none;">
        <br>
        <button type="submit"   name="submit" class="edit-button" style="color:  #87CEFA;;">Edit</button> 

      </form>
    </div>
  </div>
 </div>
</div>
</div>


  <!-- profile pic display end -->

  <!-- Add post and upload image panel -->
  <br>
  <div class="container mt-5">
  <div class="row">
    <div class="col-md-7 offset-md-2">
      <div class="card bg-light">
        <div class="card-body">
          <form method="POST" action="post_process.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="post">Add a caption/text</label>
              <textarea name="post" class="form-control" id="post" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <div class="custom-file">
                <input name="pp" type="file" class="custom-file-input" id="pp">
                <label class="custom-file-label" for="pp">Post a photo</label>
              </div>
            </div>
            <button class="btn btn-lg btn-primary text-uppercase" type="submit" style="background-color: #87CEFA; margin: 0 auto; display: block; width: 80px; padding: 0px; border-radius: 15px; color: black  ; border: none; cursor: pointer; font-size: 14px;">Post</button>

        </div>
      </div>
    </div>
  </div>
</div>



  <!-- Separator line -->
  <!--<hr style="width: 45%; margin: 30px 370px; border-width: 2px;">-->

  <!-- Display posts -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-7 offset-md-2">
        <?php
        include 'connection.php';

        $query = "SELECT * FROM `post` ORDER BY `time` DESC";
        $result = mysqli_query($con, $query);

        // Check if there are any posts
        if (mysqli_num_rows($result) > 0) {
          // Loop through each row and display the posts
         while ($row = mysqli_fetch_assoc($result)) {
    echo('<br><br>');
    
    $query2 = "SELECT `Name`, `last_name`,`picture` FROM `individual_profile` WHERE `user_id` = '" . $row['user_id'] . "'";
    $res2 = mysqli_query($con, $query2);
    $row5 = mysqli_fetch_array($res2);
    ?>
<div class="card mt-3">
  <div class="card-header" style="height:70px">
    <div class="profile-picture">
      <img class="circular-profile-pic" src="profile_pic/<?php echo $row5['picture']; ?>" alt="Profile Picture">
    </div>
    <div class="post-info">
      <h5><?php echo $row5['Name'] . " " . $row5['last_name']; ?></h5>
      <span class="date"><?php echo $row['time']; ?></span>
    </div>
  </div>
  <div class="card-body">
    <p><?php echo $row['text']; ?></p>
    <?php if (!empty($row['photo'])) { ?>
      <img class="form-control" src="uploads/<?php echo $row['photo']; ?>" alt="Post Image">
    <?php } ?>
  </div>
</div>


    <?php
    echo('<br><br>');
    echo('<hr style="width: 120%; margin: 30px -70px; border-width: 2px;">');
}

        } else {
          echo "No posts found.";
        }
        ?>
      </div>
    </div>
  </div>

  <!-- jquery -->
  <script src="js/jquery.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- owl js -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>

</html>
