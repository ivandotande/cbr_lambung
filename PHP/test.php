<?php
include 'connection.php';
if (!empty($errors)){
    foreach($errors as $error){
        echo "Value of $error<br>";
    }
}
else{
    echo"<p>Array Is empty</p>";
}
?>