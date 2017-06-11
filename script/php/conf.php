<?php
	$title="VideoGameList";
	$root=$_SERVER['DOCUMENT_ROOT'];
	$dir=$_SERVER['SERVER_NAME'];
	$db_user="root";
	$db_pass="";
	include 'scripts.php';
	$con=mysqli_connect("$dir","$db_user","$db_pass","vgdb");
	mysqli_set_charset($con, "utf8");
	session_start();
?>