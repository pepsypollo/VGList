<form action="#" method="post" accept-charset="utf-8">
	<label for="nombre">Titulo</label><br>
	<input type="text" name="nombre" id="nombre" required><br>
	<span class="error oculto" id="errorNombre"></span><br>

	<label for="foto">Imagen</label><br>
	<input type="file" name="Foto" id="foto">
	<span class="error oculto" id="errorNombre"></span><br>

	<label for="sino">Sinopsis</label><br>
	<textarea name="sino" id="sino"></textarea>
	<span class="error oculto" id="errorNombre"></span><br>	
	
	<label for="publi">Publicación</label><br>
	<input type="date" name="publi" id="publi" required><br>
	<span class="error oculto" id="errorEmail"></span><br>

	<label for="plat">Plataforma</label><br>
	<select name="plat" multiple>
		<option value="0" selected>Indefinido</option>
		<?php 
			$lista=mysqli_query($con,"SELECT * FROM plataforma;");
			$lista=mysqli_fetch_all($lista,MYSQLI_ASSOC);
			foreach ($lista as $value) {
				echo '<option value='.$value['n_plat'].'>'.$value['plataforma'].'</option>';
			}
		?>
	</select><br>

	<input type="submit" name="Insertar" value="Insertar" id="juego">
</form>