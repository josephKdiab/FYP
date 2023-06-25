<?php 
session_start();

include 'connection.php';

if(isset($_POST['title']) && isset($_POST['category']) && isset($_POST['experience']) && isset($_POST['location']) && isset($_POST['description']) && isset($_POST['email-to-contact'])&& isset($_POST['submit'])){

$title = $_POST['title'];
$category = $_POST['category'];
$experience = $_POST['experience'];
$location = $_POST['location'];
$description = $_POST['description'];
$emailtocontact = $_POST['email-to-contact'];

$query = "INSERT INTO `job-post` (title, category, experience, location, description, `contact-email`) 
          VALUES ('$title', '$category', '$experience', '$location', '$description', '$emailtocontact')";

// Execute the query
if (mysqli_query($con, $query)) {
    // The record has been successfully inserted
    header("Location:jobs.php");
} else {
    // An error occurred while inserting the record
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

}else {
    header("Location:jobs.php");

}


?>