<?php

session_start();
if (!isset($_SESSION['EMAIL'])) {
  header("Location: index.php");
}
include 'connection.php';
$email=$_SESSION['EMAIL'];
$query0 = "SELECT * FROM `individual_profile` WHERE `Email` = '" . $_SESSION['EMAIL'] . "'";
$res0=mysqli_query($con,$query0);
$row0=mysqli_fetch_array($res0);



if (isset($_GET['Email'])){
  $email= $_GET['Email'];

}


$query = "SELECT * FROM `individual_profile` WHERE `Email`='" .$email. "'";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSS and display properties begin-->
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

  <!-- CSS and display properties end-->
  <style>
    .profile-container {
      position: absolute;
      top: -320px;
       left: 50px; /*Updated value to move the panel to the extreme left */
    }



    .profile-panel {
      width: 250px;
      height: 500px;
      border-radius: 20px;
      overflow: hidden;
      background-color: #f2f2f2;
      display: flex;
      flex-direction: column;
      justify-content: center;
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

    .about-panel {
      text-align: left;
      padding-top: 200px;
      padding-right: -300px;
      /* Adjust this value for the desired spacing from the right side */
    }

    

    .rectangle-grey-panel {
      width: 35%;
      height: 310px;
      background-color: #f2f2f2;
      margin-left: auto;
      margin-right: 40px;
      margin-top: -300px;
      border-radius: 35px;
    }

    .rectangle-center {
      margin: 100px auto;
      width: 400px;
      background-color: #f2f2f2;
      border-radius: 30px;
      padding-left: 20px;
    }

    .experience {
      display: inline-block;
      max-width: 300px;
      word-wrap: break-word;
    }


    .custom-card {
      max-width: 700px;
      /* Adjust the desired width */
      margin: 600px auto;
      /* Center align the card horizontally */
      top: 400px;
      /* Adjust the top margin as needed */
    }

.add-friend {
  padding: 10px 20px;
  background-color: rgb(7, 190, 135);
  color: #fff;
  border-radius: 20px;
  text-decoration: none;
}


  
    .rounded-select {
  border-radius: 20px;
  padding: 5px;
}



  </style>
<!--rgba(172, 168, 168, 0.082);-->

</head>

<body>
  <!-- Header Section -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo" href="index2.php"><img ahref="index2.php" src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a style="padding-left:400px" class="nav-link" href="index2.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="network.php">NETWORK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jobs.php">JOBS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">SETTINGS</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Header Section End -->

  <!-- Add friend button -->




  <!-- About display section -->

  <div>
    <div class="row">
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <div class="rectangle"></div>
          <div style="padding-left: 545px" class="panel-heading about-panel"><strong>About</strong></div>
          <br>
          <div>
            <p style="padding-left: 470px"><strong>Name:</strong><?php echo $row['Name'] ?></p>
            <p style="padding-left: 470px"><strong>Last Name: </strong><?php echo $row['last_name'] ?></p>
            <p style="padding-left: 470px"><strong>Date of Birth: </strong><?php echo $row['Date-of-birth']; ?></p>
            <p style="padding-left: 470px"><strong>Gender: </strong><?php echo $row['Gender']; ?></p>
            <p style="padding-left: 470px"><strong>Country: </strong><?php echo $row['Location']; ?></p>
            <p style="padding-left: 470px"><strong>Email: </strong><?php echo $row['Email']; ?></p>
          </div>
          <div class="rectangle-grey-panel"></div>
        </div>
      </div>
      <div class="col-md-8">


<!-- Fetsh number of friends -->

<?php $query = "SELECT * FROM `individual_profile` WHERE `Email`='" .$email. "'";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_array($res);

$query5 = "SELECT * FROM `friendrequest` WHERE (`receiver_id` = " . $row['user_id'] . " OR `sender_id` = " . $row['user_id'] . ") AND `status` = 'accepted'";
$res5 = mysqli_query($con, $query5);
$row5 = mysqli_fetch_all($res5, MYSQLI_ASSOC);
$friends = mysqli_num_rows($res5);

?>

<!-- Profile Picture Section -->

        <div class="profile-container">
          <div class="profile-panel">
            <h3 class="profile-name"><?php echo $row['Name'] . " " . $row['last_name']; ?></h3>
            <div class="image-container">
              <img class="profile-image" src="profile_pic/<?php echo $row['picture']; ?>" alt="Profile Picture">
              <?php
              if (!isset($_GET['Email']) || $_SESSION['EMAIL']==$_GET['Email']) {
                echo('<form method="POST" action="profilePIC.php" enctype="multipart/form-data">
                <br>                            
                <label for="pp" style="color: rgb(7, 190, 135); class="file-label">Change picture</label>
                <input type="file" name="pp" id="pp" accept="image/*" style="display: none;">
                <br >
                <button type="submit" name="submitp"  style="color: rgb(7, 190, 135);padding-left: 5px;border-left-width: 0px;border-top-width: 00px;border-right-width: 0px;border-bottom-width: 0px;padding-left:35px">Apply</button>
              </form>');
              }
              ?>
              <br><br>
              <?php
                if (isset($_GET['Email']) && $_SESSION['EMAIL']!=$_GET['Email']) {
                  
                  
                  $query0 = "SELECT * FROM `individual_profile` WHERE `Email` = '" . $_SESSION['EMAIL'] . "'";
                  $res0=mysqli_query($con,$query0);
                  $row1=mysqli_fetch_array($res0);
                  
                  $query6 = "SELECT * FROM `friendrequest` WHERE (`receiver_id` = " . $row['user_id'] . " AND `sender_id` = " . $row1['user_id'] . ") OR (`receiver_id` = " . $row1['user_id'] . " AND `sender_id` = " . $row['user_id'] . ")";
                  $res6=mysqli_query($con,$query6);
                  $row6=mysqli_fetch_array($res6);
                  
                if(mysqli_num_rows($res6)!=0){
                 
                  if($row6['status']=='pending'){
                    echo '<a>Friend request sent</a>';
                      
                  }elseif($row6['status']=='accepted'){
                    echo '<a href="reject.php?request_id=' . $row6['request_id'] . '" class="add-friend add-friend-link">
                    friends <img src="profile_pic/green_tick.png" alt="Green Tick" class="green-tick">
                </a>';
                  }
                  else{
                    echo '<a href="friendRequest.php?Email=' . $_GET['Email'] . '" class="add-friend add-friend-link">Add friend</a>';
                  }
                }elseif(mysqli_num_rows($res6)==0 || $row6['status']=='rejected'){
                  echo '<a href="friendRequest.php?Email=' . $_GET['Email'] . '" class="add-friend add-friend-link">Add friend</a>';
                }
              }
                
                echo"<br>";
                echo "<a>" . $friends . " Friends" . "</a>";
                echo("<br>");
               
                echo '<form action="myProfile.php" method="get">';
                echo '<select name="Email" class="rounded-select">';
                foreach ($row5 as $friend) {
                    if ($friend['receiver_id'] == $row['user_id']) {
                        $friendQuery = "SELECT * FROM individual_profile WHERE user_id = " . $friend['sender_id'];
                    } else {
                        $friendQuery = "SELECT * FROM individual_profile WHERE user_id = " . $friend['receiver_id'];
                    }
                    $friendResult = mysqli_query($con, $friendQuery);
                    $friendData = mysqli_fetch_assoc($friendResult);
                
                    $profileLink = "myProfile.php?Email=" . $friendData['Email'];
                    echo '<option value="' . $friendData['Email'] . '">' . $friendData['Name'] . ' ' . $friendData['last_name'] . '</option>';
                }
                echo '</select>';
                echo '<a href="' . $profileLink . '" >Visit</a>';
                echo '</form>';
                ?>
                
                

            </div>
          </div>

          
        </div>

        
      </div>
    </div>
  </div>

 

<!-- professional info display -->

  <div class="panel panel-default">
    
    <div class="rectangle-center" style="
    margin-left: 1220px;
    width: 283px;
    height: 320px;">
      <div style=" text-align: center; padding-top: 10px;" class="panel-heading about-panel"><strong>Professional Information</strong></div>
    <br><br>
    <div style="padding-left: -75px;">
      <p><strong>Degree:</strong> <?php echo $row['degree']; ?></p>
      <p><strong>Major:</strong> <?php echo $row['major']; ?></p>
      <p><strong>Skills:</strong> <?php echo $row['skills']; ?></p>
      <p><strong>Experience:</strong> <span class="experience"><?php echo $row['experience']; ?></span></p>
    </div>
   
  </div>
  </div>

<!-- professional info display ends -->


  <!-- posts -->
  <div>
    <div class="container mt-5">
      <div class="row" style="margin-top: 430px;">
        <div class="col-md-7 offset-md-2" style="
    bottom: 1220px" ;>
          <?php
          include 'connection.php';

          $query = "SELECT * FROM `post` WHERE `user_id` = '" . $row['user_id'] . "' ORDER BY `time` DESC";
          $result = mysqli_query($con, $query);

          // Check if there are any posts
          if (mysqli_num_rows($result) > 0) {
            // Loop through each row and display the posts
            while ($row = mysqli_fetch_assoc($result)) {
              echo ('<br><br>');

              $query2 = "SELECT `Name`, `last_name`,`picture` FROM `individual_profile` WHERE `user_id` = '" . $row['user_id'] . "'";
              $res2 = mysqli_query($con, $query2);
              $row5 = mysqli_fetch_array($res2);
          ?>
              <div class=" card mt-3 d-flex justify-content-center">
                <div class="card-header" style="height:70px">
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
              echo ('<br>');
              if (!isset($_GET['Email']) || $_SESSION['EMAIL']==$_GET['Email']) {
              $deleteLink = "delete.php?post_id=" . $row['post_id'];
              echo '<a href="' . $deleteLink . '" class="delete-button" style="color: red;">Delete</a>';
              }
              echo ('<hr style="width: 120%; margin: 30px -70px; border-width: 2px;">');
            }
          } else {
            echo "No posts found.";
          }


          ?>
        </div>
      </div>
    </div>
  </div>

<!-- Display friends and nbr of friends -->




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