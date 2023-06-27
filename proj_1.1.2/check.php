<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {
  header("Location: index.php");
}

$email = $_SESSION['EMAIL'];
include 'connection.php';

// Retrieve user's name
$userQuery = "SELECT * FROM `individual_profile` WHERE `Email`='" . $email . "'";
$userResult = mysqli_query($con, $userQuery);
$userRow = mysqli_fetch_array($userResult);
$userID = $userRow['user_id'];

// Retrieve job details
$jobID = $_GET['jobID'];
$jobQuery = "SELECT * FROM `job-post` WHERE `job_id`='" . $jobID . "'";
$jobResult = mysqli_query($con, $jobQuery);
$jobRow = mysqli_fetch_array($jobResult);

// Count number of applicants
$applicantQuery = "SELECT i.* FROM `individual_profile` i
                   JOIN `applications` a ON i.Email = a.applicant_email
                   WHERE a.job_id = '" . $jobID . "'";
$applicantResult = mysqli_query($con, $applicantQuery);
$number = mysqli_num_rows($applicantResult);
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


  <style>
    .profile-image {
      width: 55px;
      height: 55px;
      border-radius: 50%;
    }

    .search-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    .search-form .form-control {
      width: 200px;
      margin-bottom: 10px;
    }

    .search-form .btn {
      padding: 8px 20px;
    }

    .job-table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .job-table th,
    .job-table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    .job-table th {
      background-color: #f2f2f2;
    }

    .applicant-table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .applicant-table th,
    .applicant-table td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }

    .applicant-table th {
      background-color: #f2f2f2;
    }

    .applicant-table img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
    }
  </style>
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
          <a href="myProfile.php" class="nav-link">PROFILE</a>
        </li>
        <div>
          <img class="profile-image" src="profile_pic/<?php echo $userRow['picture']; ?>" alt="Profile Picture">
        </div>
      </ul>
    </div>
  </nav>
  <br><br><br><br>
  <!-- Centered Panel -->
  <div class="center-panel">
    <table class="job-table">
      <tr>
        <th>Title:</th>
        <td><?php echo $jobRow['title']; ?></td>
      </tr>
      <tr>
        <th>Description:</th>
        <td><?php echo $jobRow['description']; ?></td>
      </tr>
      <tr>
        <th>Location:</th>
        <td><?php echo $jobRow['location']; ?></td>
      </tr>
      <tr>
        <th>Contact Email:</th>
        <td><?php echo $jobRow['contact-email']; ?></td>
      </tr>
      <tr>
        <th>Category:</th>
        <td><?php echo $jobRow['category']; ?></td>
      </tr>
      <tr>
        <th>Experience:</th>
        <td><?php echo $jobRow['experience']; ?></td>
      </tr>
      <tr>
        <th>Date:</th>
        <td><?php echo $jobRow['Date']; ?></td>
      </tr>
      <tr>
        <th>Applicants:</th>
        <td><?php echo $number; ?></td>
      </tr>
    </table>
    
    <?php
    if($userID==$jobRow['user_id']){
      echo '<a href="cancel.php?jobID=' . $jobID . '" style="color: red;margin-left:155px">Delete Application</a>';
    }
    ?>
    <table class="applicant-table">
      <tr>
        <th>Applicant Name</th>
        <th>Last Name</th>
        <th>Picture</th>
      </tr>
      <?php while ($row = mysqli_fetch_array($applicantResult)) { ?>
        <tr>
        <td><a href="myProfile.php?Email=<?php echo $row['Email']; ?>"><?php echo $row['Name']; ?></a></td>

          <td><?php echo $row['last_name']; ?></td>
          <td><img src="profile_pic/<?php echo $row['picture']; ?>" alt="Profile Picture"></td>
        </tr>
      <?php } ?>
    </table>
  </div>

</body>

</html>
