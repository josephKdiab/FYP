<?php  
session_start();

# check if username & password  submitted
if(isset($_POST['username']) &&
   isset($_POST['password1'])){

   # database connection file
   include '../db.conn.php';
   
   # get data from POST request and store them in var
   $password = $_POST['password1'];
   $username = $_POST['username'];

   
   
   #simple form Validation
   if(empty($username)){
      # error message
      $em = "Username is required";
      
      # redirect to 'index.php' and passing error message
      header("Location: ../../index.php?error=$em");
   }else if(empty($password)){
      # error message
      $em = "Password is required";
      
      # redirect to 'index.php' and passing error message
      header("Location: ../../index.php?error=$em");
   }else {
    
      $sql  = "SELECT * FROM users WHERE username=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);
      
      
      # if the username is exist
      if($stmt->rowCount() === 1){
        
        # fetching user data
        $user = $stmt->fetch();
        
        

        # if both username's are strictly equal
        if ($user['username'] === $username) {
           
           # verifying the encrypted password
          if (password_verify($password, $user['password'])) {

            # successfully logged in
            # creating the SESSION
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['user_id'] = $user['user_id'];
            
            $conn = null;

            include '../../connection.php';

            $query2 = "SELECT `email` FROM `users` WHERE `username`='".$_SESSION['username']."' ";
            $res2 = mysqli_query($con , $query2);
            $row = mysqli_fetch_array($res2);
            $_SESSION['EMAIL'] =$row['email'];

            $query = "SELECT `major` FROM `individual_profile` WHERE Email ='".$_SESSION['EMAIL']."'";
            $res = mysqli_query($con , $query);
            if (mysqli_num_rows($res) == 0){
              header("Location:../../profile.php");
            }else {
              header("Location: ../../index2.php");
            }
          
            # redirect to 'home.php'
            
            // Assuming $conn is your MySQLi connection object

    // Close the connection
        


          }else {
            # error message
            $em = "Incorect Username or password";

            # redirect to 'index.php' and passing error message
            header("Location: ../../index.php?error=$em");
          }
        }else {
          # error message
          $em = "Incorect Username or password";

          # redirect to 'index.php' and passing error message
          header("Location: ../../index.php?error=$em");
        }
      }
      
   }
}else {
  header("Location: ../../index.php");
  exit;
}