<?php
include "./connection.php";
if (isset($_GET['id']))
{

$result = mysqli_query($db,"DELETE FROM inventory_data WHERE part_id=".$_GET['id']);
if($result==true)
	echo "sucess";
	header("Location:Admin_Page\invmgmt.php");
}

?>