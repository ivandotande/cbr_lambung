<?php
include 'connection.php';
array_push($errors, "Password is required");
if (!empty($errors)){
    foreach($errors as $error){
        echo "Value of $error<br>";
    }
}
else{
    echo"<p>Array Is empty</p>";
}
?>