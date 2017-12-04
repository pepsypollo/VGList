<?php
	$consulta="SELECT nombre, publicacion, sinopsis, plataforma, imagen FROM juego j,plataforma p WHERE j.id_plat=p.n_plat AND j.id='".$_GET['id']."';";
	$get=mysqli_query($con,$consulta);
	$get=mysqli_fetch_array($get,MYSQLI_ASSOC);
?>
<p><h1><?php echo $get['nombre']; ?></h1></p>
<p><img src=<?php echo $get['imagen']; ?>></p>
<p><?php echo $get['publicacion']; ?></p>
<p><?php echo $get['sinopsis']; ?></p>
<p><?php echo $get['plataforma']; ?></p>