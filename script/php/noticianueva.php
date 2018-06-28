<form action="#" method="post" accept-charset="utf-8">
	<label for="tit">Titulo</label><br>
	<input type="text" name="tit" id="tit" required><br>
	<span class="error oculto" id="errorNombre"></span><br>

	<label for="img">Imagen de portada</label><br>
	<input type="file" name="img" id="img">
	<span class="error oculto" id="errorNombre"></span><br>

	<label for="cuerpo">Cuerpo de la noticia</label><br>
	<textarea name="cuerpo" id="cuerpo" required></textarea><br>

	<input type="submit" name="Registro" value="Registro" id="enviar">
</form>
<?php 
	if(isset($_POST['Insertar'])){
		$tit=$_POST["tit"];
		$cuerpo=$_POST["cuerpo"];
		$validaImg="/img/user/default.png";

		//Subir imagen
		if(isset($_FILES['img']['name']))
			if($_FILES['img']['name']!="")
				$validaImg=subirImg('img','img/noticia/',$user);

		$add=mysqli_query($con,"INSERT INTO noticias (titulo,contenido,imagen,id_usuario) VALUES ('$tit','$validaImg','$cuerpo');");
		
		//Registro correcto
		if($add){
			if($_SESSION['allow']){
				?><script>window.alert("Entrada añadida correctamente")</script><?php
			}else{
				?><script>window.alert("Entrada pendiente de aprobacion de un moderador")</script><?php
			}

		//Error
		}else{
			?><script>window.alert("Ha ocurrido un error vuelve a intentarlo mas tarde")</script><?php
		}
	}
?>