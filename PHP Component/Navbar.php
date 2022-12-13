<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="Author" content="Ivando Tande">
	<title>PCPartPicker Malaysia | Welcome about</title>
	<link rel="stylesheet" href="../css/Style.css">
</head>
<header>
<div class="container">
    <div id="branding">
        <h1><span class="highlight">PCpartPicker </span>Malaysia</h1>
    </div>
    <nav>
        <ul>
            <li class="<?php if($active == 'index') echo"active"?>">
                <a href="../index.php">Home</a>
            </li>
            <li class="<?php if($active == 'About') echo"active"?>">
                <a href="../About.php">About Us</a>
            </li>
            <li class="<?php if($active == 'Builder')echo"active"?>">
                <a href="../Builder.php">Start Building</a>
            </li>          
            <a href = "../Login.php">
                <button class="LRbutton <?php if($active == 'Login') echo"active"?>" name="loginbtn">Login</button>
            </a>
            <a href = "../Register.php">
                <button class="LRbutton <?php if($active == 'register') echo"active"?>" name="registerbtn">Register</button>
            </a>
        </ul>
    </nav>
</div>
</header>

