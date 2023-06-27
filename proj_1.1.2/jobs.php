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
   

    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      height: 100vh;
    }

  
    .panel {
      min-height: 500px;
      background-color: #f2f2f2;
      border-radius: 25px;
      padding: 20px;
      box-sizing: border-box;
    }

    .form-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      
    }

    .form-container label {
      text-align: center;
      margin-bottom: 10px;
    }

    .form-container input[type="text"] {
      width: 60%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 25px;
      box-sizing: border-box;
    }

    .form-container input[type="submit"] {
      width: 45%;
      padding: 10px;
      margin-top: 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 25px;
      cursor: pointer;
    }

    .form-container input[type="submit"]:hover {
      background-color: #45a049;
    }

    /* Right panel styles */
    .panel-container-right {
      flex-basis: 45%;
      margin: 10px 2%;
    }

    
  .panel-container-right {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 25px;
  }

  .search-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
  }

  .search-container input[type="text"],
  .search-container input[type="submit"] {
    padding: 10px;
    border: none;
    outline: none;
    border-radius: 25px;
  }

  .filter-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
  }

  .filter-container label {
    margin-right: 10px;
  }

  .filter-container select {
    padding: 8px;
    border-radius: 25px;
  }
  .profile-image {
    width: 60px;
    height: 60px;
    border-radius: 50%;
  }

  .result-item {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f5f5f5;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .result-item h4 {
    color: green;
    font-size: 18px;
    margin-bottom: 5px;
  }

  .result-item p {
    margin: 5px 0;
  }

  .result-item input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 8px 16px;
    border: none;
    cursor: pointer;
    font-size: 14px;
  }
  .toast {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .toast.show {
            opacity: 1;
        }

        .toast.success {
            background-color: #28a745;
        }

        .toast.error {
            background-color: #dc3545;
        }
        .add-job-panel {
    text-align: center;
    margin-bottom: 20px;
  }

  .add-job-panel button {
    border-radius: 20px;
    padding: 10px 20px;
    background-color: rgb(7, 190, 135);
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
  }
  .submit-container {
    text-align: center;
  }

  .submit-button {
    background-color: rgb(7, 190, 135);
    color: #fff;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    cursor: pointer;
  }

  .job-status-panel {
  border-radius: 20px;
  background-color: #f2f2f2;
  width: 300px;
  position: fixed;
  top: 700px;
  right: 1200px;
  z-index: 9999;
}


.job-status-panel h3 {
  text-align: center;
  margin-bottom: 10px;
  font-size: 16px;
}



.job-status-panel .job-list-item:last-child {
  border-bottom: none;
}


  .job-search-results th,
  .job-search-results td {
    border: 1px solid lightgray;
    padding: 8px;
  }

  .job-search-results th {
    background-color: #f5f5f5;
    font-weight: bold;
  }

  .job-search-results tr:nth-child(even) {
    background-color: #f9f9f9;
  }
</style>

</head>

<body>
  <!-- header section start-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="logo" href="index2.php"><img src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a style="padding-left:380px" ; class="nav-link" href="index2.php">HOME</a>
        </li>
        <li class="nav-item">
          <a ; class="nav-link" href="network.php">NETWORK</a>
        </li>
        <li class="nav-item">
          <a href="myProfile.php" class="nav-link">PROFILE</a>
        </li>

        <div >
          <img class="profile-image" src="profile_pic/<?php echo $row['picture']; ?>" alt="Profile Picture">
        </div>
      </ul>
    </div>
  </nav>
  <!-- header section start end-->
<br><br><br><br>
<div class="container"    style="margin-right: 300px;
    padding-left: 400px;">
<div class="add-job-panel"style="padding-left: -200px;">
  <button id="showPanelButton">Add Job Here</button>
</div>
  <div class="panel-container" style="display: none;">
    <div class="panel">
      
      <h3 style="text-align: center;">ADD JOB</h3>
      <form class="form-container" action="jobs_insert.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category">

        <label for="description">Description:</label>
        <input type="text" id="description" name="description">

        <label for="location">Location:</label>
        <input type="text" id="location" name="location">

        <label for="location">Experience:</label>
        <input type="text" id="experience" name="experience">

        <label for="location">Contact:</label>
        <input type="text" id="email-to-contact" name="email-to-contact">

        <input type="submit" value="Submit" name="submit">
      </form>
    </div>
  </div>

  <div class="panel-container-right">
  <div class="panel-right">
    <!-- Right panel content here -->
    <form action="jobs.php" method="POST">
      <div class="search-container">
        Title:<input type="text" id="search-input" placeholder="Search" name="search-bar">
      </div>
      <div class="search-container">
        Prefered Category:<input type="text" id="category-input" placeholder="Category" name="category-bar">
      </div>
      <div class="search-container">
        Prefered Location:<input type="text" id="location-input" placeholder="Location" name="location-bar">
      </div>
      <div class="submit-container">
        <input type="submit" value="Search" name="search" class="submit-button">
        <input type="reset" value="Reset" class="submit-button" onclick="window.location.href='jobs.php'">
      </div>
    </form>
  </div>
</div>

</div>
</div>
  <div style="display: flex; justify-content: center;margin-top:-300px ">
  <div style="text-align: center;">
  <?php
  include 'connection.php';

  if (isset($_POST['search']) || isset($_POST['category-bar']) || isset($_POST['location-bar'])) {
    // Build the SQL query with dynamic filters
    $query = "SELECT * FROM `job-post` WHERE 1 = 1"; // Start with a dummy condition

    // Add filters based on the submitted form inputs
    if (isset($_POST['search']) && !empty($_POST['search-bar'])) {
      $searchTerm = $_POST['search-bar'];
      $query .= " AND title LIKE '%$searchTerm%' OR category LIKE '%$searchTerm%' OR location LIKE '%$searchTerm%'";
    }

    if (isset($_POST['category-bar']) && !empty($_POST['category-bar'])) {
      $category = $_POST['category-bar'];
      $query .= " AND category LIKE '%$category%'";
    }

    if (isset($_POST['location-bar']) && !empty($_POST['location-bar'])) {
      $location = $_POST['location-bar'];
      $query .= " AND location LIKE '%$location%'";
    }
    $res = mysqli_query($con, $query);

    if (isset($_POST['search'])) {
      $counter = 1; // Initialize a counter variable
    
      echo '<table class="job-search-results">';
      echo '<tr>
              <th>Job #</th>
              <th>Title</th>
              <th>Description</th>
              <th>Experience</th>
              <th>Location</th>
              <th>Contact Email</th>
              <th>Category</th>
              <th>Action</th>
            </tr>';
    
      while ($row1 = mysqli_fetch_array($res)) {
        $title = $row1['title'];
        $description = $row1['description'];
        $experience = $row1['experience'];
        $location = $row1['location'];
        $contactEmail = $row1['contact-email'];
        $category = $row1['category'];
        $job_id = $row1['job_id'];
        
        $query6 = "SELECT * FROM `applications` WHERE `job_id` = $job_id";
        $res6 = mysqli_query($con, $query6);
        $row6 = mysqli_fetch_array($res6);
        

        echo '<tr>';
        echo '<td>' . $counter . '</td>';
        echo '<td>' . $title . '</td>';
        echo '<td>' . $description . '</td>';
        echo '<td>' . $experience . '</td>';
        echo '<td>' . $location . '</td>';
        echo '<td>' . $contactEmail . '</td>';
        echo '<td>' . $category . '</td>';
        if($row['user_id']==$row1['user_id'] ){
          echo '<td style="color: red;">mine</td>';
        }elseif(mysqli_num_rows($res6)!=0 && $row6['applicant_email']==$_SESSION['EMAIL']){
          echo '<td style="color: red;">applied</td>';

        }else{
         
          echo '<td><a href="apply_job.php?email=' . $contactEmail . '&job_id=' . $job_id . '">Apply</a></td>';
        }
        echo '</tr>';
    
        $counter++; // Increment the counter
      }
    
      echo '</table>';
    }}
    ?>
</div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('#showPanelButton').click(function () {
      $('.panel-container').toggle();
    });
  });
</script>

<script>
  document.getElementById("showPanelButton").addEventListener("click", function() {
  var searchResults = document.getElementById("search-results");
  var addJobPanel = document.querySelector(".add-job-panel");
  
  if (addJobPanel.getBoundingClientRect().top > 0) {
    searchResults.classList.add("thin-border");
    searchResults.classList.remove("thick-border");
  } else {
    searchResults.classList.add("thick-border");
    searchResults.classList.remove("thin-border");
  }

  searchResults.classList.toggle("pushed-down");
});

  </script>
  
  <div class="job-status-panel" style="margin-right: 0px; margin-top: -500px;">
  <h3>Job Status</h3>
  <div class="job-list">
    <h6>Jobs Posted by me:</h6>
    <div class="list-container">
      <?php
      include 'connection.php';

      // Query to retrieve jobs applied by the user
      $Email=$row['Email'];
      $userId = $row['user_id'];
      $query = "SELECT * FROM `job-post` WHERE `user_id` = '$userId'";
      $result = mysqli_query($con, $query);

      echo '<select id="applied-jobs" class="form-control">';
    
      while ($jobRow = mysqli_fetch_array($result)) {
        $title = $jobRow['title'];
        $jobID = $jobRow['job_id'];
        echo '<option value="' . $jobID . '">' . $title . '</option>';
      }
      ?>
   
    </select>
    <button id="goButton">Check</button>

    
    <script>
      var jobSpinner = document.getElementById('applied-jobs');
      var goButton = document.getElementById('goButton');
    
      goButton.addEventListener('click', function() {
        var selectedJobID = jobSpinner.value;
        window.location.href = 'check.php?jobID=' + selectedJobID;
      });
    </script>
    
  

  </div>
  <div class="job-list">
  <h6>Jobs Applied Title:</h6>
  <div class="list-container">
    <?php
    $query = "SELECT * FROM `applications` WHERE `applicant_email` = '$email'";
    $result = mysqli_query($con, $query);
    echo '<select id="applied-jobs1" class="form-control">';
  
    while ($jobRow = mysqli_fetch_array($result)) {
      $id = $jobRow['job_id'];
      $query ="SELECT * FROM `job-post` WHERE `job_id`='$id' ";
      $res=mysqli_query($con,$query);
      $row=mysqli_fetch_array($res); // Fetch the row data
    
      $title1 = $row['title'];
      echo '<option value="' . $id . '">' . $title1. '</option>';
    }
    ?>
  </select>
  <button id="GoButton">Check</button>

  <script>
    var jobSpinner1 = document.getElementById('applied-jobs1');
    var goButton = document.getElementById('GoButton');

    goButton.addEventListener('click', function() {
      var selectedJobID1 = jobSpinner1.value;
      window.location.href = 'check.php?jobID=' + selectedJobID1;
    });
  </script>
  </div>
</div>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#applied-jobs').select2({
      placeholder: 'Select a job',
      allowClear: true
    });
  });
</script>

<style>
  .list-container {
    max-height: 150px;
    overflow-y: auto;
  }
  
  .check-link {
    display: block;
    text-align: center;
    margin-top: 10px;
  }
</style>




<title>Jobs</title>
</head>
<body>
    <!-- Your HTML code for jobs page -->

    <?php
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        $toastClass = isset($_SESSION['success_message']) ? 'success' : 'error';
        unset($_SESSION['success_message']);
        unset($_SESSION['error_message']);
    }
    ?>

    <?php if (isset($message)) { ?>
        <div class="toast <?php echo $toastClass; ?>">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <script>
        // JavaScript code to show/hide the toast message
        var toast = document.querySelector('.toast');
        if (toast) {
            toast.classList.add('show');
            setTimeout(function() {
                toast.classList.remove('show');
            }, 3000); // Adjust the timeout value to control the duration of the toast message
        }
    </script>

  <!-- Javascript files -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
