<?php
	include "conf.php";
	$user=$_GET['user'];
	$tabla=$_GET['tabla'];
	$id=$_GET['id'];
	$borrar=$_GET['borrar'];

	if($borrar)
		$query="DELETE FROM puntos_$tabla WHERE id_usuario='$user' AND id_$tabla=$id;";
	else
		$query="INSERT INTO puntos_$tabla VALUES ('$user',$id);";

	$exec=mysqli_query($con,$query);

	$puntos=mysqli_query($con,"SELECT * FROM puntos_$tabla WHERE id_$tabla=$id;");

	echo mysqli_num_rows($puntos);

?>