<?php
session_start();


include 'connection.php';
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
            <form class="form-signin" method="post" action="p_profileauthentication.php">
              <div class="form-label-group">
                <label for="degree"></label>
                <select class="form-control" name="degree" id="degree" required>
                  
                  <option value="High School">High School</option>
                  <option value="Bachelor's Degree">Bachelor's Degree</option>
                  <option value="Master's Degree">Master's Degree</option>
                  <option value="PhD">PhD</option>
                  <option value="other">Other</option>
                  <!-- Add more options as needed -->
                </select>
              </div>


<div class="form-label-group">
    <label for="major"></label>
    <?php
    // Assuming you have established a database connection

    // Fetch majors from the database
    $query = "SELECT major FROM education";
    $result = mysqli_query($con, $query);

    // Check if query was successful
    if ($result) {
        // Start building the select element with the Select2 class
        echo '<select class="form-control" name="major" id="major" required>';
    
        // Iterate over the result set and populate the select options
        while ($row = mysqli_fetch_assoc($result)) {
            $major = $row['major'];
            echo '<option value="' . $major . '">' . $major . '</option>';
        }
    
        // Close the select element
        echo '</select>';
    
        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle the error if the query fails
        echo 'Error: ' . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
    ?>
</div>



              <br>
              <style>
                .nav-link:hover {
                  color: rgb(7, 190, 135)
                }
              </style>
             

              <div class="form-label-group">
                <label for="skills">Skills:</label>
                <input class="form-control" type="text" name="skills" id="skills" required>
              </div>
              <div class="form-label-group">
                <label for="experience">Work experience:</label>
                <input class="form-control" type="text" name="experience" id="experience" required>
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.animate-paragraph').addClass('animate');
    });
  </script>

<script>
    $(document).ready(function() {
      $('#degree').select2();
    });
  </script>

<script>
    $(document).ready(function() {
      $('#major').select2();
    });
  </script>


</body>

</html>
