<?php
    include "./connection.php";
    try{
    $uname      = filter_input(INPUT_POST,'uname',FILTER_SANITIZE_STRING);
    $email      = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password_1 = $_POST['psw'];
    $password_2 = $_POST['psw-repeat'];
    if($password_1 != $password_2){
       echo"Password is not the same please check again";
    }
    else{
        $sql = "INSERT INTO user_data (USERNAME,USER_EMAIL,USER_PASSWORD)
        VALUES ('$uname','$email','$password_1')";
        if($conn->query($sql) == TRUE){
            echo "Records added successfully.";
            if($active == 'UserManagement'){
                header('Location: ..\Admin_Page\additem.php');
            }
            else{
                header('Location: ../Login.php');
            }
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>