<form enctype="multipart/form-data" action="#" method="post" accept-charset="utf-8">
	<label for="nombre">Titulo</label><br>
	<input type="text" name="nombre" id="nombre" required><br>

	<label for="foto">Imagen</label><br>
	<input type="file" name="Foto" id="foto">

	<label for="sinopsis">Sinopsis</label><br>
	<textarea name="sinopsis" id="sinopsis"></textarea><br>
	
	<label for="publi">Publicación</label><br>
	<input type="date" name="publi" id="publi" required><br>

	<label for="plat">Plataforma</label><br>
	<select name="plat" multiple>
		<?php 
			$lista=mysqli_query($con,"SELECT * FROM plataforma;");
			$lista=mysqli_fetch_all($lista,MYSQLI_ASSOC);
			foreach ($lista as $value) {
				echo '<option value='.$value['n_plat'].'>'.$value['plataforma'].'</option>';
			}
		?>
	</select><br>

	<input type="submit" name="Insertar" value="juego" id="juego">
</form>
<?php 
	if(isset($_POST['Insertar'])){
		$nombre=$_POST["nombre"];
		$sinopsis="Aun no hay sinopsis";
		$publi="";
		$n_plat="0";
		$validaImg="/img/juego/default.png";
		
		if(isset($_POST['sinopsis']))
			$sinopsis=$_POST["sinopsis"];

		if(isset($_POST['publi']))
			$publi=$_POST["publi"];

		if(isset($_POST['plat']))
			$n_plat=$_POST["plat"];

		//Subir foto de perfil
		if(isset($_FILES['foto']['name']))
			if($_FILES['foto']['name']!="")
				$validaImg=subirImg('foto','img/user/',$user);

		$add=mysqli_query($con,"INSERT INTO juego (nombre,publicacion,sinopsis,id_plat,imagen) VALUES ('$nombre','$publi','$sinopsis','$n_plat','$validaImg');");
		
		//Registro correcto
		if($add){
			if($_SESSION['allow']){
				?><script>window.alert("Entrada añadida correctamente")</script><?php
			}else{
				?><script>window.alert("Entrada pendiente de aprobacion de un moderador")</script><?php
			}

		//Usuario ya registrado
		}else{
			?><script>window.alert("Ha ocurrido un error vuelve a intentarlo mas tarde")</script><?php
		}
	}
?>