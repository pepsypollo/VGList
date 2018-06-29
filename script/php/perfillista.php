<script type="text/javascript" src="..\..\script\js\function.js"></script>

<p id="user" hidden><?php
	if (isset($_GET['user']))
		$user=$_GET['user'];
	else
		$user=$_SESSION['user'];
	echo $user;
?></p>

<div style="text-align:center;">
	<label class='form-check-label' for="todos">Mostrar todos</label>
	<input class='form-check-input' onchange="lista(document.getElementById('user').innerHTML,'todo')" type="radio" name="cat" value="todos" id="todos" checked>
	<label class='form-check-label' for="favoritos">Mostrar favoritos</label>
	<input class='form-check-input' onchange="lista(document.getElementById('user').innerHTML,'favoritos')" type="radio" name="cat" value="favoritos" id="favoritos">
	<label class='form-check-label' for="completados">Mostrar completados</label>
	<input class='form-check-input' onchange="lista(document.getElementById('user').innerHTML,'completados')" type="radio" name="cat" value="completados" id="completados">
	<label class='form-check-label' for="coleccion">Mostrar coleccion</label>
	<input class='form-check-input' onchange="lista(document.getElementById('user').innerHTML,'coleccion')" type="radio" name="cat" value="coleccion" id="coleccion">
</div>
<div class="container">
  <table class="table">
    <thead>
      <tr>
      	<th>Imagen</th>
        <th>Titulo</th>
        <th>Fecha de publicación</th>
        <th>Plataforma</th>
        <th>Favorito</th>
        <th>Completado</th>
        <th>Colección</th>
      </tr>
    </thead>
    <tbody id="lista">
    	<?php
      $query="SELECT * FROM juego j, lista l, plataforma p WHERE j.id=l.id_juego AND n_plat=id_plat AND id_usuario='$user'";
	$query=mysqli_query($con,$query);
	$query=mysqli_fetch_all($query,MYSQLI_ASSOC);
	foreach ($query as $valor) {
		echo "<tr>";
	        echo "<td><img src='$valor[imagen]' style='max-height:50px;max-width:50px;'></td>";
	        echo "<td><a href='/juegos.php?id=$valor[id_juego]'>$valor[nombre]</a></td>";
	        echo "<td>$valor[publicacion]</td>";
	        echo "<td>$valor[plataforma]</td>";
	        echo "<td><input type=checkbox disabled ";
	        if($valor['favorito'])
	        	echo "checked";
	        echo "></td>";
	        echo "<td><input type=checkbox disabled ";
	        if($valor['completado'])
	        	echo "checked";
	        echo "></td>";
	        echo "<td><input type=checkbox disabled ";
	        if($valor['coleccion'])
	        	echo "checked";
	        echo "></td>";
      	echo "</tr>";
	}
	?>
    </tbody>
  </table>
</div>