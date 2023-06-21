<?php 
session_start();
include 'connection.php';

if (isset($_POST['loginemail']) &&  isset($_POST['loginpass'])){

    $email=$_POST['loginemail'];
    $password=$_POST['loginpass'];

    $email=htmlspecialchars($email);
    $password=htmlspecialchars($password);

    $query ="SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
    
    if(!$res=mysqli_query($con , $query))
    {
        header("Location:login.php?error=1");
        exit;
    }else if(!$array2=mysqli_fetch_array($res)){
        header("Location:login.php?error=2");
        exit;
    }else {
        
        $_SESSION['EMAIL']=$array2['email'];
        $_SESSION['NAME']=$array2['Name'];
        
        $query = "SELECT `major` FROM `individual_profile` WHERE `email` = '".$email."'";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_array($res);

        if (mysqli_num_rows($res) == 0) {
            header("Location: profile.php");
        } else {
            header("Location: index.php");
        }


    }}

else {
    header("Location:sigin.php?error=4");
}



// Create array of user data
$userData = array();
if ($res->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }
}

// Return user data in JSON format
header('Content-Type: application/json');
echo json_encode($userData);


?>


