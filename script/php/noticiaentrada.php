<?php
	$consulta="SELECT id, titulo, imagen, contenido, id_usuario FROM noticias WHERE id='".$_GET['id']."';";
	$get=mysqli_query($con,$consulta);
	$get=mysqli_fetch_array($get,MYSQLI_ASSOC);
?>
<p><h1><?php echo $get['titulo']; ?></h1></p>
<h6>Escrito por <?php echo $get['id_usuario']; ?></h6>
<p><img src=<?php echo $get['imagen']; ?>></p>
<p><?php echo $get['contenido']; ?></p>