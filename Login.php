<?php
    unset($active);
    $active = 'Login';
    include '.\PHP\connection.php';
    include '.\PHP\Navbar.php';
?>
<html>    
    <body>
        <div class="login-page">
            <div class="form">
                <form method ="post" class="login-form" action="">
                <link rel="stylesheet" href=".\css\loginstyle.css">   
                <?php 
                include '.\PHP\connection.php';
                if(!empty($errors)){
                    foreach ($errors as $error){
                        echo $error;
                    }
                } 
                else{
                    echo"OK";
                }
                ?>
                <h1>Login Page</h1>
                <input type="text" name= "uname" placeholder="Username" required/>
                <input type="password" name= "psw" placeholder="Password" required/>
                <button type="submit" class="btn" name="login_btn">login</button>
                <!-- <p class="message">Not registered? <a href="Register.html">Create an account</a></p> -->
            </form>
            </div>
        </div>
    </body>
    <?php
    include '.\PHP\Footer.php';
    ?>
</html>
<?php
if(isset($_POST['login_btn'])) {
  $uname = filter_input(INPUT_POST, 'uname');
  $password = $_POST['psw'];
  $getadmin = "select * from db_admin where username='$uname' AND password= '$password'";
  $run = mysqli_query($conn,$getadmin);
  $count = mysqli_num_rows($run);
  if($count==1){
    echo "<script>alert('Logged in. Welcome Back')</script>";
    echo "<script>window.open('adminpage.php','_self')</script>";
  }else{
    echo "<script>alert('Email or Password is Wrong !')</script>"; 
  }
}
?>