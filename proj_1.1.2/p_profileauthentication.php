<?php
session_start();
$emailp=$_SESSION['EMAIL'];
if(!isset($_SESSION['EMAIL'])){
    header("Location:signin.php");

}else {
    
    include 'connection.php';
    if($_POST['degree']  && $_POST['major'] && $_POST['skills'] && $_POST['experience'] ){

        $degree=  htmlspecialchars(strtolower($_POST['degree']));
        $major= htmlspecialchars(strtolower($_POST['major']));
        $skills= htmlspecialchars(strtolower($_POST['skills']));
        $experience = htmlspecialchars(strtolower($_POST['experience']));
        


        $query = "SELECT * FROM `individual_profile` WHERE `Email`='".$emailp."'";
        $res = mysqli_query($con , $query);
        $row = mysqli_fetch_array($res);
        

        if (mysqli_num_rows($res) == 0) {
            $query2 = "INSERT INTO `individual_profile` (`Email`, `degree`, `major`, `skills`, `experience`) VALUES ('".$emailp."', '".$degree."', '".$major."', '".$skills."', '".$experience."')";
          } else {
            $query2 = "UPDATE `individual_profile` SET `degree`='".$degree."', `major`='".$major."', `skills`='".$skills."', `experience`='".$experience."' WHERE `Email`='".$emailp."'";
          }
        $res2=mysqli_query($con , $query2);
        header("Location:index.php");
        }
           
        else {

        echo "something went wrong";
      }

    
    }
    

?>





