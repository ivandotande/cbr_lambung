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
            <li class="<?php if($active == 'index') echo"active"?>">
                <a href=".\index.php">Home</a>
            </li>
            <li class="<?php if($active == 'About') echo"active"?>">
                <a href=".\About.php">Proses Diagnosa</a>
            </li>
            <li class="<?php if($active == 'About') echo"active"?>">
                <a href=".\About.php">Informasi</a>
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

