<?php
session_start();
$email = $_SESSION['EMAIL'];

$currentTime = date('Y-m-d H:i:s');

if (!isset($_SESSION['EMAIL'])) {
    header("Location: index.php");
    exit;
}

include 'connection.php';
$query = "SELECT `user_id` FROM `users` WHERE `email` = '".$email."'";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_array($res);
$id = $row['user_id'];

$new_img_name = ''; // Initialize the variable with an empty string

if (isset($_POST['post'])) {
    $text = $_POST['post'];
    $query2 = "INSERT INTO `post` (`user_id`, `text`, `time`, `photo`) VALUES ('".$id."', '".$text."', '".$currentTime."', '".$new_img_name."')";
    $res2 = mysqli_query($con, $query2);
}

$query3 = "SELECT `post_id` FROM `post` WHERE `user_id` = '".$id."' AND `text` = '".$text."'";
$res3 = mysqli_query($con, $query3);
$row3 = mysqli_fetch_array($res3);
$post_id=$row3['post_id'];



//insert phto in the database
if (isset($_FILES['pp'])) {
    $img_name = $_FILES['pp']['name'];
    $tmp_name = $_FILES['pp']['tmp_name'];
    $error = $_FILES['pp']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png","pdf"); 

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = $post_id . '.' . $img_ex_lc;
            $img_upload_path = 'D:\Users\Joseph\Desktop\FYP\proj_1.1.2/uploads/'. $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Update the photo column in the post table
            $sql = "UPDATE `post` SET `photo` = '".mysqli_real_escape_string($con, $new_img_name)."' WHERE `post_id` = '".$post_id."'";
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

header("Location:index2.php");
exit;
?>
