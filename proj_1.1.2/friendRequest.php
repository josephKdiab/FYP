
<?php
session_start();
$email=$_SESSION['EMAIL'];

if(!isset($_SESSION['EMAIL'])){
    header("Location:index.php");

}else {

    include 'connection.php';

    $query = "SELECT `user_id` FROM `users` WHERE `email` = '".$email."'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    $id = $row['user_id'];

    $email2= $_GET['Email'];
    $query2 = "SELECT `user_id` FROM `users` WHERE `email` = '".$email2."'";
    $res2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($res2);
    $id2 = $row2['user_id'];
    
    $query3 = "INSERT INTO `friendrequest` (`sender_id`, `receiver_id`, `status`) VALUES ('" . $id . "', '" . $id2 . "', 'pending')";
    $res3 = mysqli_query($con , $query3);
    header("Location: myProfile.php?Email=" . $_GET['Email']);



}