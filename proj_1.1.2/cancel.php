<?php
session_start();
include 'connection.php';

$id=$_GET['jobID'];


$query = "DELETE FROM `job-post` WHERE job_id = $id";
mysqli_query($con, $query);


$query2 = "DELETE FROM `applications` WHERE job_id = $id";
mysqli_query($con, $query2);

header("Location:jobs.php");
?>

