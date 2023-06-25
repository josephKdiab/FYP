<?php
session_start();
$emailp=$_SESSION['EMAIL'];
    
    include 'connection.php';
    if($_POST['name']  && $_POST['location'] && $_POST['gender'] && $_POST['dob'] ){

        $namep =  htmlspecialchars(strtolower($_POST['name']));
        $Lname= htmlspecialchars(strtolower($_POST['Lname']));
        $locationp= htmlspecialchars(strtolower($_POST['location']));
        $genderp = htmlspecialchars(strtolower($_POST['gender']));
        $dobp=$_POST['dob'];

        $query = "SELECT `user_id` FROM `users` WHERE `email` = '".$emailp."'";
        $res = mysqli_query($con, $query);
        $row1 = mysqli_fetch_array($res);
        $id = $row1['user_id'];

        $query = "SELECT * FROM `individual_profile` WHERE `Email`='".$emailp."'";
        $res = mysqli_query($con , $query);
        $row = mysqli_fetch_array($res);
        

        if(($num_of_rows = mysqli_num_rows($res)) == 0){

        $query2 = "INSERT INTO `individual_profile` (`user_id`,`Name`, `Email`, `Location`, `Gender`, `Date-of-birth`, `last_name`,`picture`) VALUES ('".$id."','".$namep."','".$emailp."','".$locationp."','".$genderp."','".$dobp."','".$Lname."','profile.jpg')";

        $res2=mysqli_query($con , $query2);
        header("Location:p_profile.php");
        }
           
        else {

        echo "something went wrong";
      }

    
}


?>
