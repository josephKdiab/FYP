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
    body {
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      height: 100vh;
    }

    .panel-container {
      flex-basis: 45%;
      margin: 0 2%;
      background-color: #f2f2f2;
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
      margin: 0 2%;
    }

    
  .panel-container-right {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 25px;
  }

  .panel-right {
    /* Add any additional styles for the panel if needed */
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
          <a style="padding-left:380px" ; class="nav-link" href="search jobs.html">NETWORK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jobs.php">JOBS</a>
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
  <!-- header section start end-->

  <div class="container">
    <div class="panel-container">
      <div class="panel">
        <!-- Left panel content here -->
        <h3 style="text-align: center;">ADD JOB</h3>
        <form class="form-container" action="jobs_insert.php" method="POST">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title">

          <label for="category">Category:</label>
          <input type="text" id="category" name="category">

          <label for="description">Description:</label>
          <input type="text" id="description" name="description">

          <label for="location">Location:</label>
          <input type="text" id="location" name="location">

          <label for="location">Experience:</label>
          <input type="text" id="location" name="experience">

          <label for="location">Email to contact:</label>
          <input type="text" id="location" name="email-to-contact">

          <input type="submit" value="Submit" name="submit">
        </form>
      </div>
    </div>

    <div class="panel-container-right">
      <div class="panel-right">
        <!-- Right panel content here -->
        <!-- start of search form -->
          <form action="jobs.php" method="POST">
        <div class="search-container">
          Title:<input type="text" id="search-input" placeholder="Search" name ="search-bar">
          <input type="submit" value="Search" name ="search">
        </div>

        <div class="search-container">
          Prefered Category:<input type="text" id="search-input" placeholder="Category" name ="category-bar">
        </div>

        <div class="search-container">
          Prefered Location:<input type="text" id="search-input" placeholder="Location" name ="location-bar">
          
        </div>
          </form>
          
          <style>
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
</style>



          <?php
          include 'connection.php';

          if(isset($_POST['search-bar']) && isset($_POST['search'])){
            $keyword = $_POST['search-bar'];
            $query = "SELECT * FROM `job-post` WHERE title LIKE '%$keyword%' OR category LIKE '%$keyword%' OR location LIKE '%$keyword%'";
            $res = mysqli_query($con , $query);
          
            echo '<div id="search-results">';
            while ($row = mysqli_fetch_assoc($res)) {
            $title = $row['title'];
            $description = $row['description'];
            $experience = $row['experience'];
            $location = $row['location'];
            $contactEmail = $row['contact-email'];
            $category = $row['category'];

            echo '
              <div class="result-item">
                <h4 style="color:green">' . $title . '</h4>
                <p><strong>Description:</strong> ' . $description . '</p>
                <p><strong>Experience:</strong> ' . $experience . '</p>
                <p><strong>Location:</strong> ' . $location . '</p>
                <p><strong>Contact Email:</strong> ' . $contactEmail . '</p>
                <p><strong>Category:</strong> ' . $category . '</p>
                <a href="apply_job.php?email=' . $contactEmail . '">Apply</a>.
              </div>';

          }
              
            echo '</div>';
          }

          

          ?>
</div>

          <!-- end of search form -->
        <div id="search-results">
          <!-- Display search results here -->
        </div>
      </div>
    </div>
  </div>

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
