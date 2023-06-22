<?php
session_start();
include 'connection.php';



if (isset($_POST['loginemail']) && isset($_POST['loginpass'])) {
    $email = $_POST['loginemail'];
    $password = $_POST['loginpass'];

    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    $query = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "'";

    if (!$res = mysqli_query($con, $query)) {
        header("Location:login.php?error=1");
        exit;
    } else if (!$array2 = mysqli_fetch_array($res)) {
        header("Location:login.php?error=2");
        exit;
    } else {
        $_SESSION['EMAIL'] = $array2['email'];
        $_SESSION['NAME'] = $array2['Name'];

        $checkQuery = "SELECT `major` FROM individual_profile WHERE email = '" . $email . "'";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) == 0) {

         
            header("Location: profile.php");
            
            
        }else{

        header("Location: index.php");
        }
    }
} else {
    header("Location:sigin.php?error=4");
    exit;
}
?>
