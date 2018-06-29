<h3>Análisis</h3>
<?php
	if(isset($_SESSION['user'])){
		$user=$_SESSION['user'];
		if(isset($_POST['enviar'])){
			$analisis=$_POST['analisis'];
			if (strcmp($analisis, "")) {
				if(!strcmp($_POST['enviar'], "Subir análisis")){
					$query="INSERT INTO analisis(contenido, id_juego, id_usuario) VALUES ('$analisis',$juego,'$user');";
					$add=mysqli_query($con,$query);
					if($add)
						echo "Análisis subido correctamente";
					else
						echo "Ha ocurrido un error";
				}else{
					if(!strcmp($_POST['enviar'], "Actualizar análisis")){
						$query="UPDATE analisis SET contenido='$_POST[analisis]' WHERE id = $_POST[id_analisis];";
						$add=mysqli_query($con,$query);
						if($add)
							echo "Análisis actualizado correctamente";
						else
							echo "Ha ocurrido un error";
					}else{
						if(!strcmp($_POST['enviar'], "Eliminar análisis")){
							$query="DELETE FROM analisis WHERE id = $_POST[id_analisis];";
							$add=mysqli_query($con,$query);
							if($add)
								echo "Análisis eliminado correctamente";
							else
								echo "Ha ocurrido un error";
						}
					}
				}
			}else{
				echo "Debes escribir algo";
			}
		}
		$cons=mysqli_query($con,"SELECT * FROM analisis WHERE id_juego=$juego AND id_usuario='$user';");
		$an=mysqli_fetch_assoc($cons);
		echo "<form action='/juegos.php?id=$juego&analisis' method='post' accept-charset='utf-8'>";
		if(mysqli_num_rows($cons)==0){
			echo "<h3>Escribir nuevo analisis</h3>";
		}else{
			echo "<h3>Editar mi análisis</h3>";
		}
			echo "<textarea class='form-control' rows='5' id='analisis' name='analisis'>";
			if(mysqli_num_rows($cons)!=0)
				echo $an['contenido'];
			echo "</textarea>";
		if(mysqli_num_rows($cons)==0){
			echo "<input class='form-control' type='submit' name='enviar' value='Subir análisis'>";
		}else{
			echo "<input class='form-control' type='submit' name='enviar' value='Actualizar análisis'>";
			echo "<input class='form-control' type='submit' name='enviar' value='Eliminar análisis'>";
			echo "<input type='hidden' name='id_analisis' value='$an[id]'>";
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
		echo "'><a href='juegos.php?id=$juego&analisis&count=$i&page=1'>$i</a>";	
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
	
	$pagmax=mysqli_query($con,"SELECT * FROM analisis WHERE id_juego=$juego;");
	$pagmax=mysqli_num_rows($pagmax);
	$pagmax=ceil($pagmax/$count);

	$consulta=mysqli_query($con,"SELECT * FROM analisis WHERE id_juego=$juego LIMIT ".$count." OFFSET ".$page*$count." ;");
	$consulta=mysqli_fetch_all($consulta,MYSQLI_ASSOC);

	foreach ($consulta as $valor) {
		$puntos=mysqli_query($con,"SELECT * FROM puntos_analisis WHERE id_analisis=$valor[id];");
		$valores=mysqli_fetch_all($puntos,MYSQLI_ASSOC);
		?>
		<div style="clear:both;">
			<p id=id hidden><?php echo $valor['id']; ?></p>
			<p id=user><?php echo $valor['id_usuario']; ?></p>
			<p>Puntos : <b id="puntos"><?php echo mysqli_num_rows($puntos); ?></b></p>
			<script type="text/javascript" src="..\..\script\js\function.js"></script>
			<p><?php echo $valor['contenido']; ?></p><br>
			<?php if(isset($_SESSION['user'])){ ?>
			<button id="votar" onclick="upvote('analisis',document.getElementById('user').innerHTML,document.getElementById('id').innerHTML)"><?php
					$boton="Votar";
					foreach ($valores as $punto) {
						if(!strcmp($punto['id_usuario'], $user))
							$boton="Quitar voto";
					}
					echo $boton;
			?></button>
			<?php } ?>
		</div>
		<?php
	}

	echo "<ol class='btn-group btn-breadcrumb'>";
	
	for ($i=1; $i <= $pagmax; $i++) { 
		echo "<li class='btn btn-default";
		if($i==$_GET['page'])
			echo " active";
		echo "'><a href='juegos.php?id=$juego&analisis&count=$count&page=$i'>$i</a></li>";
	}
	echo "</ol>";
?>