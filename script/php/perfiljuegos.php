<?php
	include "conf.php";
	$user=$_GET['user'];
	$campo=$_GET['campo'];
	$query="SELECT * FROM juego j, lista l, plataforma p WHERE j.id=l.id_juego AND n_plat=id_plat AND id_usuario='$user'";
	if (!strcmp($campo, "favoritos")) {
		$query=$query." AND favorito=1";
	}
	if (!strcmp($campo, "completados")) {
		$query=$query." AND completado=1";
	}
	if (!strcmp($campo, "coleccion")) {
		$query=$query." AND coleccion=1";
	}
	$query=mysqli_query($con,$query);
	$query=mysqli_fetch_all($query,MYSQLI_ASSOC);
	foreach ($query as $valor) {
		echo "<tr>";
	        echo "<td><img src='$valor[imagen]' style='max-height:50px;max-width:50px;'></td>";
	        echo "<td><a href='/juegos.php?id=$valor[id_juego]'>$valor[nombre]</a></td>";
	        echo "<td>$valor[publicacion]</td>";
	        echo "<td>$valor[plataforma]</td>";
	        echo "<td><input type=checkbox disabled ";
	        if($valor['favorito'])
	        	echo "checked";
	        echo "></td>";
	        echo "<td><input type=checkbox disabled ";
	        if($valor['completado'])
	        	echo "checked";
	        echo "></td>";
	        echo "<td><input type=checkbox disabled ";
	        if($valor['coleccion'])
	        	echo "checked";
	        echo "></td>";
      	echo "</tr>";
	}
?>