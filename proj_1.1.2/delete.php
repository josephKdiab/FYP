<?php

session_start();
if (!isset($_SESSION['EMAIL'])) {
  header("Location: index.php");
}
include 'connection.php';

$id=$_GET['post_id'];
$query = "DELETE FROM `post` WHERE `post_id` = $id";
mysqli_query($con, $query);

header("Location:myProfile.php");