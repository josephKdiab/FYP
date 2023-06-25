<?php
session_start();
include 'connection.php';

$request_id=$_GET['request_id'];
$query = "UPDATE `friendrequest` SET `status` = 'accepted' WHERE `request_id` = $request_id";
$res=mysqli_query($con,$query);

header("Location:index2.php");

?>