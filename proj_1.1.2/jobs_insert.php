<?php 
session_start();

include 'connection.php';
$email=$_SESSION['EMAIL'];
$query2 = "SELECT * FROM `individual_profile` WHERE `Email` = '$email'";
$res2 = mysqli_query($con, $query2);
$row2=mysqli_fetch_array($res2);
$id=$row2['user_id'];

if(isset($_POST['title']) && isset($_POST['category']) && isset($_POST['experience']) && isset($_POST['location']) && isset($_POST['description']) && isset($_POST['email-to-contact'])&& isset($_POST['submit'])){

$title = $_POST['title'];
$category = $_POST['category'];
$experience = $_POST['experience'];
$location = $_POST['location'];
$description = $_POST['description'];
$emailtocontact = $_POST['email-to-contact'];
$currentTime = date('Y-m-d H:i:s');

$query = "INSERT INTO `job-post` (title, category, experience, location, description, `contact-email`, user_id, `Date`) 
          VALUES ('$title', '$category', '$experience', '$location', '$description', '$emailtocontact', '$id', '$currentTime')";


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