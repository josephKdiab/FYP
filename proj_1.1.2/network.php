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
    .table th,
  .table td {
    padding: 0px; /* Adjust the padding value as needed */
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
      <form class="search-form" method="POST">
  <h3>Filter by:</h3>
  <input style="border-radius: 20px" type="text" class="form-control" placeholder="Name" name="name">
  
  
  <input style="border-radius: 20px" type="text" class="form-control" placeholder="Last Name" name="last_name">
 
   <!-- Filter by major -->
  <select style="border-radius: 20px" class="form-control" name="major">
    <option value="">All majors</option>
    <?php
    $query1 = "SELECT major FROM education";
    $result1 = mysqli_query($con, $query1);
    while ($row1 = mysqli_fetch_array($result1)) {
      $major = $row1['major'];
      echo "<option value='$major'>$major</option>";
    }
    ?>
    </select>
  
  <!-- Filter by major end -->

  <!-- Filter by location -->

  <select style="border-radius: 20px" class="form-control" name="location">
    <option value="">All Locations</option>
    <?php
    $query = "SELECT country FROM countries";
    $result = mysqli_query($con, $query);
    while ($row2 = mysqli_fetch_array($result)) {
      $location = $row2['country'];
      echo "<option value='$location'>$location</option>";
    }
    ?>
    </select>

    <!-- Filter by location end-->

        <!-- Filter by degree -->
        <label for="degree"></label>
        <select style="border-radius: 20px" class="form-control" name="degree" id="degree" >
        <option value="">Select Degree</option>
        <option value="High School">High School</option>
        <option value="Bachelor's Degree">Bachelor's Degree</option>
        <option value="Master's Degree">Master's Degree</option>
        <option value="PhD">PhD</option>
        <option value="other">Other</option>
        </select>
<!-- Filter by degree end-->

  <button class="btn btn-primary" style="background-color: rgb(7, 190, 135); border-radius: 20px;" name='search' type="submit">Search</button>
</form>

      </div>
    </div>


    <?php
    if(isset($_POST['search'])){
        $name = $_POST['name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $location = $_POST['location'] ?? '';
        $degree = $_POST['degree'] ?? '';
        $degree=htmlspecialchars($degree);
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
            echo("<br><br><br><br>");
            $counter = 1; // Initialize counter
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>'; // Counter column
            echo '<th>Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Profile Picture</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row3 = mysqli_fetch_array($res)) {
                echo '<tr>';
                echo '<td>' . $counter++ . '</td>'; // Display counter value and increment it
                echo '<td><a href="myProfile.php?Email=' . $row3['Email'] . '">' . $row3['Name'] . '</a></td>';
                echo '<td>' . $row3['last_name'] . '</td>';
                echo '<td><img class="profile-image" src="profile_pic/' . $row3['picture'] . '" alt="Profile Picture"></td>';
            
                $query6 = "SELECT * FROM `friendrequest` WHERE ((`receiver_id` = " . $row['user_id'] . " AND `sender_id` = " . $row3['user_id'] . ") OR (`receiver_id` = " . $row3['user_id'] . " AND `sender_id` = " . $row['user_id'] . ")) AND `status` = 'accepted'";
                $res6 = mysqli_query($con, $query6);
                $isFriend = mysqli_num_rows($res6) > 0;
                echo '<td>';
                if ($isFriend) {
                    echo '<img class="green-tick" src="profile_pic/green_tick.png" alt="Profile Picture">';
                }
                echo '</td>';
            
                echo '</tr>';
            }
        }}
    ?>

  </div>

</body>

</html>
