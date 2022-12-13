<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="Author" content="IT">
	<title>Website.co</title>
	<link rel="stylesheet" href=".\css\Style.css">
</head>
<header>
<div class="container">
    <div id="branding">
        <h1><span class="highlight">Sistem pakar Diagnosa Penyakit Mata <br>
            Menggunakan Metode Case Base Reasoning(CBR) <br>
            PHP & MYSQL</span></h1>
    </div>
    <nav>
        <ul>
            <li class="<?php if($active == 'adminpage') echo"active"?>">
                <a href=".\adminpage.php">Home</a>
            </li>
            <li class="<?php if($active == 'adminpage') echo"active"?>">
                <a href=".\adminpage.php">Penyakit dan solusi</a>
            </li>
            <li class="<?php if($active == 'gejala') echo"active"?>">
                <a href=".\gejala.php">Gejala</a>
            </li>
            <li class="<?php if($active == 'About') echo"active"?>">
                <a href=".\About.php">Tentang</a>
            </li>
            <li class="<?php if($active == 'About') echo"active"?>">
                <a href=".\About.php">Daftar Penyakit</a>
            </li>
            <a href = ".\Login.php">
                <button class="LRbutton <?php if($active == 'Login') echo"active"?>" name="loginbtn">Login</button>
            </a>
        </ul>
    </nav>
</div>
</header>

