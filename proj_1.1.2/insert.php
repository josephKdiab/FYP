<?php 

include 'connection.php';

if (isset($_POST['email']) && isset($_POST['password'])  ){

    $email=$_POST['email'];
    $query1 = "SELECT `email` FROM `users` WHERE email='".$email."'";
    $res1=mysqli_query($con , $query1);
    $row1=mysqli_fetch_array($res1);

    if(empty($row1)){

    $qry = "INSERT INTO `users`( `email`, `password`,`user_type`) VALUES ('".$_POST['email']."','".$_POST['password']."','user')";
    mysqli_query($con , $qry);


    header ("Location:login.php");}

        else {
            echo "<h1>This email  already exists</h1>"."<h2><a href='register.php'>Click here </a> to go back";
        }

}

?>