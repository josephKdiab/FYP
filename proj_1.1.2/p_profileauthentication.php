<?php
session_start();


    $EMAIL = $_SESSION['EMAIL'];
    
    include 'connection.php';
    if($_POST['degree']  && $_POST['major'] && $_POST['skills'] && $_POST['experience'] ){

        $degree=  htmlspecialchars(strtolower($_POST['degree']));
        $major= htmlspecialchars(strtolower($_POST['major']));
        $skills= htmlspecialchars(strtolower($_POST['skills']));
        $experience = htmlspecialchars(strtolower($_POST['experience']));
        


        $query = "SELECT * FROM `individual_profile` WHERE `Email`='".$EMAIL."'";
        $res = mysqli_query($con , $query);
        $row = mysqli_fetch_array($res);
         
        var_dump($row);

        if (mysqli_num_rows($res) == 0) {
            $query2 = "INSERT INTO `individual_profile` (`Email`, `degree`, `major`, `skills`, `experience`) VALUES ('".$EMAIL."', '".$degree."', '".$major."', '".$skills."', '".$experience."')";
          } else {
            $query2 = "UPDATE `individual_profile` SET `degree`='".$degree."', `major`='".$major."', `skills`='".$skills."', `experience`='".$experience."' WHERE `Email`='".$EMAIL."'";
          }
        $res2=mysqli_query($con , $query2);
        header("Location:index2.php");
        }
           
        else {

        echo "something went wrong";
      }


    


?>
