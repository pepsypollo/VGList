<?php
	$consulta="SELECT p.titulo, m.contenido, m.id_user, u.img FROM mensaje m,post p,usuario u WHERE p.id=m.id_post AND m.id_user=u.user AND m.id_post='".$_GET['id']."';";
	$get=mysqli_query($con,$consulta);
	$get=mysqli_fetch_all($get,MYSQLI_ASSOC);

	echo "<h3>".$get[0]['titulo']."</h3>";

	foreach ($get as $valor) {
		echo "<p>$valor[id_user]</p>";
		echo "<img src=$valor[img]>";
		echo "<p>$valor[contenido]</p>";
	}
?>