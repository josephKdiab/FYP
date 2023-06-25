<?php 

# server name
$sName = "127.0.0.4";
# user name
$uName = "root";
# password
$pass = "";

# database name
$db_name = "fyp";







#creating database connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}