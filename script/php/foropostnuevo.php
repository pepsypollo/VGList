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