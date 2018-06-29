<?php
	$consulta="SELECT p.titulo, m.contenido, m.id_user, u.img FROM mensaje m,post p,usuario u WHERE p.id=m.id_post AND m.id_user=u.user AND m.id_post='".$_GET['id']."';";
	$get=mysqli_query($con,$consulta);
	$get=mysqli_fetch_all($get,MYSQLI_ASSOC);

	echo "<h3>".$get[0]['titulo']."</h3>";

	foreach ($get as $valor) {
		echo "<p>$valor[id_user]<img src=$valor[img] style='float:left;max-width:50px;max-height:50px'></p>";
		echo "<p>$valor[contenido]</p>";
		echo "<a href='denuncia.php?ban=$valor[id_user]'>Denunciar Usuario</a>";
	}
	if(isset($_SESSION['user'])){
?>
<form action="#" method="post" accept-charset="utf-8">
	<label for="cuerpo">Responder</label><br>
	<textarea name="cuerpo" id="cuerpo" required></textarea><br>

	<input type="submit" name="Enviar" value="Enviar" id="enviar">
</form>
<?php
		if(isset($_POST['cuerpo'])){
			$cuerpo=$_POST['cuerpo'];
			$id=$_GET['id'];
			$user=$_SESSION['user'];
			$add=mysqli_query($con,"INSERT INTO mensaje (contenido, id_post, id_user) VALUES ('$cuerpo',$id,'$user');");
			if($add){
				header("Refresh:0");
			}
		}
	}else{
		echo "<p>Debes estar registrado para responder a este post</p>";
	}
?>