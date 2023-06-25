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
    
    $new_img_name = ''; // Initialize the variable with an empty string
     
    
    //insert phto in the database
    if (isset($_FILES['pp'])) {
       
        $img_name = $_FILES['pp']['name'];
        $tmp_name = $_FILES['pp']['tmp_name'];
        $error = $_FILES['pp']['error'];
    
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
    
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = $id . '.' . $img_ex_lc;
                $img_upload_path = 'D:\Users\Joseph\Desktop\FYP\proj_1.1.2/profile_pic/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
    
                // Update the photo column in the post table
                $sql = "UPDATE `individual_profile` SET `picture` = '".mysqli_real_escape_string($con, $new_img_name)."' WHERE `user_id` = '".$id."'";
                $res1 = mysqli_query($con, $sql);
    
                if (!$res1) {
                    $em = "An error occurred while updating the profile picture";
                    header("Location: ../../index2.php?error=$em");
                    exit;
                }
            } else {    
                $em = "You can't upload files of this type";
                header("Location: ../../index2.php?error=$em");
                exit;
            }
        } else {
            $em = "Error occurred while uploading the file";
            header("Location: ../../index2.php?error=$em");
            exit;
        }
    }
    if(isset($_POST['submitp'])){
        header("Location:myProfile.php");
    }
    else{
        header("Location:index2.php");
    }
  exit;
}
?>
