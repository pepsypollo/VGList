<form enctype="multipart/form-data" action="#" method="post" accept-charset="utf-8">
	<label for="nombre">Titulo</label><br>
	<input class='form-control' type="text" name="nombre" id="nombre" required><br>

	<label for="foto">Imagen</label><br>
	<input class='form-control' type="file" name="foto" id="foto">

	<label for="sinopsis">Sinopsis</label><br>
	<textarea class='form-control' name="sinopsis" id="sinopsis"></textarea><br>
	
	<label for="publi">Publicación</label><br>
	<input class='form-control' type="date" name="publi" id="publi" required><br>

	<label for="plat">Plataforma</label><br>
	<select class='form-control' name="plat" multiple>
		<?php 
			$lista=mysqli_query($con,"SELECT * FROM plataforma;");
			$lista=mysqli_fetch_all($lista,MYSQLI_ASSOC);
			foreach ($lista as $value) {
				echo '<option value='.$value['n_plat'].'>'.$value['plataforma'].'</option>';
			}
		?>
	</select><br>

	<?php
		if ($_SESSION['allow']) {
			
		}
	?>

	<input class='form-control' type="submit" name="Insertar" value="Enviar" id="juego">
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

		//Subir imagen
		if(isset($_FILES['foto']['name']))
			if($_FILES['foto']['name']!=""){
				$query = mysqli_query($con,"SELECT MAX(id) FROM juego;");
				$results = mysqli_fetch_assoc($query);
				$cur_auto_id = $results['MAX(id)'] + 1;
				$validaImg=subirImg('foto','img/juego/',$cur_auto_id);
				if(!$validaImg)
					$validaImg="/img/juego/default.png";
			}

		$add=mysqli_query($con,"INSERT INTO juego (nombre,publicacion,sinopsis,id_plat,imagen,allow) VALUES ('$nombre','$publi','$sinopsis','$n_plat','$validaImg',$_SESSION[allow]);");
		
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