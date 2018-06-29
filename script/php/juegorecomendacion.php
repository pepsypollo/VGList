<h3>Recomendaciones</h3>
<?php
	if(isset($_SESSION['user'])){
		$user=$_SESSION['user'];
		if(isset($_POST['enviar'])){
			$recomendacion=$_POST['recomendacion'];
			$juego2=$_POST['juego'];
			if(!strcmp($_POST['enviar'], "Subir recomendacion")){
				$query="INSERT INTO recomendacion(contenido, id_juego, id_juego2, id_usuario) VALUES ('$recomendacion',$juego,$juego2,'$user');";
				$add=mysqli_query($con,$query);
				if($add)
					echo "Recomendación subida correctamente";
				else
					echo "Ha ocurrido un error";
			}else{
				if(!strcmp($_POST['enviar'], "Actualizar recomendacion")){
					$query="UPDATE recomendacion SET contenido='$_POST[recomendacion]' WHERE id = $_POST[id_recomendacion];";
					$add=mysqli_query($con,$query);
					if($add)
						echo "Recomendación actualizada correctamente";
					else
						echo "Ha ocurrido un error";
				}else{
					if(!strcmp($_POST['enviar'], "Eliminar recomendacion")){
						$query="DELETE FROM recomendacion WHERE id = $_POST[id_recomendacion];";
						$add=mysqli_query($con,$query);
						if($add)
							echo "Recomendación eliminada correctamente";
						else
							echo "Ha ocurrido un error";
					}
				}
			}
		}
		$cons=mysqli_query($con,"SELECT * FROM recomendacion WHERE id_juego=$juego AND id_usuario='$user';");
		$rec=mysqli_fetch_assoc($cons);

		$juegos=mysqli_query($con,"SELECT * FROM juego j, plataforma p WHERE j.id_plat=p.n_plat;");
		$juegos=mysqli_fetch_all($juegos,MYSQLI_ASSOC);
		echo "<form action='/juegos.php?id=$juego&recomendacion' method='post' accept-charset='utf-8'>";
		if(mysqli_num_rows($cons)==0){
			echo "<h3>Escribir nueva recomendacion</h3>";
		}else{
			echo "<h3>Editar mi recomendacion</h3>";
		}
			echo "<textarea class='form-control' rows='5' id='recomendacion' name='recomendacion' required>";
			if(mysqli_num_rows($cons)!=0)
				echo $rec['contenido'];
			echo "</textarea>";
			echo "<select id='juego' name='juego' class='form-control' required>";
			foreach ($juegos as $valor) {
				if($juego!=$valor['id'])
					echo "<option value=$valor[id]>$valor[nombre] / $valor[plataforma]</option>";
			}
			echo "</select>";
		if(mysqli_num_rows($cons)==0){
			echo "<input class='form-control' type='submit' name='enviar' value='Subir recomendacion'>";
		}else{
			echo "<input class='form-control' type='submit' name='enviar' value='Actualizar recomendacion'>";
			echo "<input class='form-control' type='submit' name='enviar' value='Eliminar recomendacion'>";
			echo "<input type='hidden' name='id_recomendacion' value='$rec[id]'>";
		}
		echo "</form>";
	}

?>
<h4>Entradas por página</h4>
<?php
	echo "<ol class='btn-group btn-breadcrumb'>";
	for ($i=10; $i <= 100; $i=$i+10) { 
		echo "<li class='btn btn-default";
		if($i==$_GET['count'])
			echo " active";
		echo "'><a href='juegos.php?id=$juego&recomendacion&count=$i&page=1'>$i</a>";	
	}
	echo "</ol>";
	//Paginacion
	if(!isset($_GET['page']))
		$page=0;
	else
		$page=$_GET['page']-1;
	
	if(!isset($_GET['count']))
		$count=5;
	else
		$count=$_GET['count'];
	
	$pagmax=mysqli_query($con,"SELECT * FROM recomendacion WHERE id_juego=$juego;");
	$pagmax=mysqli_num_rows($pagmax);
	$pagmax=ceil($pagmax/$count);

	$consulta=mysqli_query($con,"SELECT * FROM recomendacion WHERE id_juego=$juego OR id_juego2=$juego LIMIT ".$count." OFFSET ".$page*$count." ;");
	$consulta=mysqli_fetch_all($consulta,MYSQLI_ASSOC);

	foreach ($consulta as $valor) {
		$puntos=mysqli_query($con,"SELECT * FROM puntos_recomendacion WHERE id_recomendacion=$valor[id];");
		$valores=mysqli_fetch_all($puntos,MYSQLI_ASSOC);
		$juego_rec=mysqli_query($con,"SELECT * FROM juego WHERE id=$valor[id_juego2];");
		$juego_rec=mysqli_fetch_assoc($juego_rec);
		?>
		<div style="clear:both;">
			<p id=id hidden><?php echo $valor['id']; ?></p>
			<p id=user><?php echo $valor['id_usuario']; ?></p>
			<a href="/juegos.php?id=<?php echo $juego_rec['id']; ?>"><img src="<?php echo $juego_rec['imagen']; ?>" style='max-width:75px;max-height:75px;'></a>
			<a href="/juegos.php?id=<?php echo $juego_rec['id']; ?>"><?php echo $juego_rec['nombre']; ?></a>
			<p>Puntos : <b id="puntos"><?php echo mysqli_num_rows($puntos); ?></b></p>
			<script type="text/javascript" src="..\..\script\js\function.js"></script>
			<p><?php echo $valor['contenido']; ?></p>
			<?php if(isset($_SESSION['user'])){ ?>
			<button id="votar" onclick="upvote('recomendacion',document.getElementById('user').innerHTML,document.getElementById('id').innerHTML)"><?php
					$boton="Votar";
					foreach ($valores as $punto) {
						if(!strcmp($punto['id_usuario'], $user))
							$boton="Quitar voto";
					}
					echo $boton;
			?></button>
			<?php } ?>
			</br>
		</div>
		<?php
	}

	echo "<ol class='btn-group btn-breadcrumb'>";
	
	for ($i=1; $i <= $pagmax; $i++) { 
		echo "<li class='btn btn-default";
		if($i==$_GET['page'])
			echo " active";
		echo "'><a href='juegos.php?id=$juego&recomendacion&count=$count&page=$i'>$i</a></li>";
	}
	echo "</ol>";
?>