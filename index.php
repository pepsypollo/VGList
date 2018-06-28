	<?php 
	include 'script\php\template.php';

	$juegos=mysqli_query($con,"SELECT id,nombre,imagen,plataforma FROM juego j,plataforma p WHERE j.id_plat=p.n_plat ORDER BY publicacion ASC LIMIT 10;");
	$juegos=mysqli_fetch_all($juegos, MYSQLI_ASSOC);

	$noticias=mysqli_query($con,"SELECT id, titulo, imagen, id_usuario FROM noticias LIMIT 5;");
	$noticias=mysqli_fetch_all($noticias, MYSQLI_ASSOC);
	?>
	<table>
		<tr><th>Juegos Recientes</th></tr>
		<tr>
			<?php
			foreach ($juegos as $juego) {
				echo "<td>";
				echo "<a href='\juegos.php?id=".$juego['id']."'><img src='".$juego['imagen']."' style='float:left;max-width:100px;max-height:100px'></a><br>";
				echo $juego['nombre']."/".$juego['plataforma'];
				echo "</td>";
			}
			?>
		</tr>
		<tr><th>Noticias Recientes</th></tr>
		<tr>
			<?php
			foreach ($noticias as $noticia) {
				echo "<td>";
				echo "<a href='\\noticias.php?id=".$noticia['id']."'><img src='".$noticia['imagen']."' style='float:left;max-width:100px;max-height:100px'></a><br>";
				echo $noticia['titulo'];
				echo "</td>";
			}
			?>
		</tr>
	</table>
</body>
</html>