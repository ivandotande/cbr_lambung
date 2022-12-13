<?php
include 'connection.php';
if(isset($_POST['login_btn'])) {
  $uname = filter_input(INPUT_POST, 'uname');
  $password = $_POST['psw'];
  $getadmin = "select * from db_admin where username='$uname' AND password= '$password'";
  $run = mysqli_query($conn,$getadmin);
  $count = mysqli_num_rows($run);
  if($count==1){
    echo "<script>alert('Logged in. Welcome Back')</script>";
    echo "<script>window.open('index.php?dashboard','_self')</script>";
  }else{
    echo "<script>alert('Email or Password is Wrong !')</script>"; 
  }
}
?>