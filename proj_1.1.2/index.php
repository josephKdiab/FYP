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
  <style>
    .profile-panel {
      position: absolute;
      top: 160px;
      left: 65px;
      width: 100px;
      height: 100px;
      border-radius: 60%;
      overflow: hidden;
      background-color: rgb(98, 107, 104); /* Set your desired background color here */
    }

    .profile-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
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
          <a class="nav-link" href="recurments.html">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Settings</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- header section start end-->

  <!-- profile pic display -->
  <div class="profile-panel">
    <?php
    $profilePicPath = 'profile_pic/profile.jpg';
    ?>
    <img class="profile-image" src="<?php echo $profilePicPath; ?>" alt="Profile Picture">
  </div>
  <!-- profile pic display end -->

  <!-- Add post and upload image panel -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-7 offset-md-2">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="post_process.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="post">Add a Post</label>
                <textarea name="post" class="form-control" id="post" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input name="pp" type="file" class="custom-file-input" id="pp">
                  <label class="custom-file-label" for="pp">Choose file</label>
                </div>
              </div>
              <button class="btn btn-lg btn-primary text-uppercase" type="submit" style="background-color: rgb(7, 190, 135); position: absolute; bottom: 2px; left: 510px; width: 120px; padding: 0px 0px; border-radius: 20px; color: #fff; font-weight: bold; border: none; cursor: pointer;">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Separator line -->
  <hr style="width: 45%; margin: 30px 370px; border-width: 2px;">

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

            $query2 = "SELECT `Name`, `last_name` FROM `individual_profile` WHERE `user_id` = '" . $row['user_id'] . "'";
            $res2 = mysqli_query($con, $query2);
            $row5 = mysqli_fetch_array($res2);
            ?>
            <div class="card mt-3">
              <div class="card-header" style="height:70px">
                <h5> <?php echo $row5['Name'] . " " . $row5['last_name']; ?></h5>
                <span style="" class="date"><?php echo $row['time']; ?></span>
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
