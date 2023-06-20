<?php 
session_start();
include 'connection.php';
if (isset($_POST['loginemail']) &&  isset($_POST['loginpass'])){

    $email=$_POST['loginemail'];
    $password=$_POST['loginpass'];

    $email=htmlspecialchars($email);
    $password=htmlspecialchars($password);

    $query ="SELECT * FROM user WHERE email='".$email."' AND password='".$password."'";
    
    if(!$res=mysqli_query($con , $query))
    {
        header("Location:signin.php?error=1");
        exit;
    }else if(!$array2=mysqli_fetch_array($res)){
        header("Location:signin.php?error=2");
        exit;
    }else {
        
        $_SESSION['EMAIL']=$array2['email'];
        $_SESSION['NAME']=$array2['Name'];
        
        header("Location:profile.php");
        
    }

}

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


