<?php
session_start();
$emailp=$_SESSION['EMAIL'];
if(!isset($_SESSION['EMAIL'])){
    header("Location:signin.php");

}else {
    
    include 'connection.php';
    if($_POST['name']  && $_POST['location'] && $_POST['gender'] && $_POST['dob'] ){

        $namep =  htmlspecialchars(strtolower($_POST['name']));
        $Lname= htmlspecialchars(strtolower($_POST['Lname']));
        $locationp= htmlspecialchars(strtolower($_POST['location']));
        $genderp = htmlspecialchars(strtolower($_POST['gender']));
        $dobp=$_POST['dob'];


        $query = "SELECT * FROM `individual_profile` WHERE `Email`='".$emailp."'";
        $res = mysqli_query($con , $query);
        $row = mysqli_fetch_array($res);
        

        if(($num_of_rows = mysqli_num_rows($res)) == 0){

        $query2 = "INSERT INTO `individual_profile` (`Name`, `Email`, `Location`, `Gender`, `Date-of-birth`, `last_name`) VALUES ('".$namep."','".$emailp."','".$locationp."','".$genderp."','".$dobp."','".$Lname."')";

        $res2=mysqli_query($con , $query2);
        header("Location:p_profile.php");
        }
           
        else {

        echo "something went wrong";
      }

    
    }
    
}
?>





