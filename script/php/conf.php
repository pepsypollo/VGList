<?php
	$title="VideoGameList";
	$root="D:\VGList";
	$dir="www.vglist.es";
	$db_user="root";
	$db_pass="";
	$con=mysqli_connect("$dir","$db_user","$db_pass","vgdb");
	mysqli_set_charset($con, "utf8");
	session_start();
?>