<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {
  header("Location: index.php");
}

$email = $_SESSION['EMAIL'];
include 'connection.php';
$query = "SELECT * FROM `individual_profile` WHERE `Email`='" . $email . "'";
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


  <style>

  .profile-image {
    width: 60px;
    height: 60px;
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
  </style>
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
          <a style="padding-left:400px" class="nav-link" href="index2.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jobs.php">JOBS</a>
        </li>
        <li class="nav-item">
          <a href="myProfile.php" class="nav-link">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">SETTINGS</a>
        </li>
        <div >
          <img class="profile-image" src="profile_pic/<?php echo $row['picture']; ?>" alt="Profile Picture">
        </div>
      </ul>
    </div>
  </nav>

  <!-- Search Panels -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form class="search-form"  method="POST">
          <h3>Filter by:</h3>
          <input type="text" class="form-control" placeholder="Name" name="name">
          <input type="text" class="form-control" placeholder="Last Name" name="last_name">
          <input type="text" class="form-control" placeholder="Major" name="major">
          <input type="text" class="form-control" placeholder="Location" name="location">
          <input type="text" class="form-control" placeholder="Buy Degree" name="buy_degree">
          <button class="btn btn-primary" name='search' type="submit">Search</button>
        </form>
      </div>
    </div>
    <!-- Other search panels for additional parameters -->
    <!-- Add similar code for other search parameters -->

    <?php
    if(isset($_POST['search'])){
        $name = $_POST['name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $location = $_POST['location'] ?? '';
        $degree = $_POST['buy_degree'] ?? '';
        $major = $_POST['major'] ?? '';

        $query = "SELECT * FROM `individual_profile` WHERE 1=1";
        if (!empty($name)) {
          $query .= " AND `Name` LIKE '%$name%'";
        }
        if (!empty($lastName)) {
          $query .= " AND `last_name` LIKE '%$lastName%'";
        }
        if (!empty($location)) {
          $query .= " AND `location` LIKE '%$location%'";
        }
        if (!empty($degree)) {
          $query .= " AND `degree` LIKE '%$degree%'";
        }
        if (!empty($major)) {
          $query .= " AND `major` LIKE '%$major%'";
        }

        $res = mysqli_query($con, $query);

        if (mysqli_num_rows($res) > 0) {
          echo '<table class="table">';
          echo '<thead>';
          echo '<tr>';
          echo '<th>Name</th>';
          echo '<th>Last Name</th>';
          echo '<th>Profile Picture</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          while ($row = mysqli_fetch_array($res)) {
            echo '<tr>';
            echo '<td><a href="myProfile.php?email=' . $row['Email'] . '">' . $row['Name'] . '</a></td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td><img class="profile-image" src="profile_pic/' . $row['picture'] . '" alt="Profile Picture"></td>';
            echo '</tr>';
          }
          echo '</tbody>';
          echo '</table>';
        } else {
          echo '<p>No results found.</p>';
        }
    }
    ?>

  </div>

</body>

</html>
