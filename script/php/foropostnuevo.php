<form enctype="multipart/form-data" action="#" method="post" accept-charset="utf-8">
	<label for="nombre">Titulo</label><br>
	<input type="text" name="nombre" id="nombre" required><br>

	<label for="msg">Mensaje inicial</label><br>
	<textarea name="msg" id="msg" required></textarea><br>

	<label for="cat">Categoría</label><br>
	<select name="cat" multiple>
		<option value="0" selected>Indefinida</option>
		<?php 
			$lista=mysqli_query($con,"SELECT * FROM categoria;");
			$lista=mysqli_fetch_all($lista,MYSQLI_ASSOC);
			foreach ($lista as $value) {
				echo '<option value='.$value['n_cat'].'>'.$value['categoria'].'</option>';
			}
		?>
	</select><br>

	<input type="submit" name="Insertar" value="post" id="Publicar">
</form>
<?php
	if(isset($_POST['Insertar'])){
		$nombre=$_POST["nombre"];
		$msg=$_POST["msg"];
		$cat=$_POST["cat"];
		$user=$_SESSION['user'];

		$add=mysqli_query($con,"INSERT INTO post (titulo, n_cat, id_user) VALUES ('$nombre',$cat,'$user');");
		
		//Registro correcto
		if($add){
			$id=mysqli_insert_id($con);
			$add2=mysqli_query($con,"INSERT INTO mensaje (contenido, id_post, id_user) VALUES ('$msg',$id,'$user');");
			header("Refresh:0; url=foro.php?id=$id");
		//Error
		}else{
			?><script>window.alert("Ha ocurrido un error vuelve a intentarlo mas tarde")</script><?php
		}
	}
?>