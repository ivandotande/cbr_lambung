<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lambungcbr";
$conn = new mysqli($servername, $username, $password, $dbname);
if(!empty($errors)){
  $errors = (array)null;
}
else{
  
}

// Create connection

//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
