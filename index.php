<?php
session_start();
unset($active);
$active = 'index';
include '.\PHP\connection.php';
include '.\PHP\Navbar.php';
?>
<html>





<?php
include '.\PHP \Footer.php';
?>