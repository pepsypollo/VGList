<ul>
	<li><a href="perfil.php?admin&juego">Juegos pendientes de moderación</a></li>
	<li><a href="perfil.php?admin&denuncia">Denuncias pendientes de moderación</a></li>
	<li><a href="perfil.php?admin&promo">Promover/degradar usuario</a></li>
</ul>
<?php
	if (isset($_GET['juego'])) {
		if (isset($_POST['aprobar'])) {
			$id=$_POST['id'];
			$update="UPDATE juego SET allow=1 WHERE id=$id;";
			$update=mysqli_query($con,$update);
		}
		if (isset($_POST['denegar'])) {
			$id=$_POST['id'];
			$delete="DELETE FROM juego WHERE id=$id;";
			$delete=mysqli_query($con,$delete);
		}
?>
<div class="container">
  <table class="table">
    <thead>
      <tr>
      	<th>Imagen</th>
        <th>Titulo</th>
        <th>Fecha de publicación</th>
        <th>Plataforma</th>
        <th>Aprobar</th>
        <th>Denegar</th>
      </tr>
    </thead>
    <tbody id="lista">
<?php
	$query="SELECT * FROM juego j, plataforma p WHERE n_plat=id_plat AND allow=0;";
	$query=mysqli_query($con,$query);
	$query=mysqli_fetch_all($query,MYSQLI_ASSOC);
	foreach ($query as $valor) {
		echo "<tr>";
	        echo "<td><img src='$valor[imagen]' style='max-height:50px;max-width:50px;'></td>";
	        echo "<td><a href='/juegos.php?id=$valor[id]'>$valor[nombre]</a></td>";
	        echo "<td>$valor[publicacion]</td>";
	        echo "<td>$valor[plataforma]</td>";
	        echo "<form enctype='multipart/form-data' action='#' method='post' accept-charset='utf-8'>";
		        echo "<td><input type='submit' name='aprobar' value='Aprobar'></td>";
		        echo "<td><input type='submit' name='denegar' value='Denegar'></td>";
		        echo "<td><input type='hidden' name='id' value='$valor[id]'></td>";
	        echo "</form>";
      	echo "</tr>";
      }
?>
    </tbody>
  </table>
</div>
<?php
	}
	if (isset($_GET['denuncia'])) {
		if (isset($_POST['aprobar'])) {
			$id=$_POST['id'];
			$id_user=$_POST['id_user_ban'];
			$delete1="DELETE FROM usuario_ban WHERE id=$id;";
			$delete2="DELETE FROM usuario WHERE id=$id;";
			$delete1=mysqli_query($con,$delete1);
			$delete2=mysqli_query($con,$delete2);
		}
		if (isset($_POST['denegar'])) {
			$id=$_POST['id'];
			$delete="DELETE FROM usuario_ban WHERE id=$id;";
			$delete=mysqli_query($con,$delete);
		}
?>
<div class="container">
  <table class="table">
    <thead>
      <tr>
      	<th>Denunciante</th>
        <th>Denunciado</th>
        <th>Razon de la denuncia</th>
        <th>Eliminar usuario</th>
        <th>Eliminar denuncia</th>
      </tr>
    </thead>
    <tbody id="lista">
<?php
	$query="SELECT * FROM usuario_ban;";
	$query=mysqli_query($con,$query);
	$query=mysqli_fetch_all($query,MYSQLI_ASSOC);
	foreach ($query as $valor) {
		echo "<tr>";
	        echo "<td><a href='/perfil.php?user=$valor[id_user]'>$valor[id_user]</a></td>";
	        echo "<td><a href='/perfil.php?user=$valor[id_user_ban]'>$valor[id_user_ban]</a></td>";
	        echo "<td>$valor[razon]</td>";
	        echo "<form enctype='multipart/form-data' action='#' method='post' accept-charset='utf-8'>";
		        echo "<td><input type='submit' name='aprobar' value='Aprobar'></td>";
		        echo "<td><input type='submit' name='denegar' value='Denegar'></td>";
		        echo "<td><input type='hidden' name='id' value='$valor[id]'></td>";
		        echo "<td><input type='hidden' name='id_user_ban' value='$valor[id_user_ban]'></td>";
	        echo "</form>";
      	echo "</tr>";
      }
?>
    </tbody>
  </table>
</div>
<?php
	}
	if (isset($_GET['promo'])) {
		
	}
?>