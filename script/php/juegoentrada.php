<?php
	$consulta="SELECT nombre, publicacion, sinopsis, plataforma, imagen FROM juego j,plataforma p WHERE j.id_plat=p.n_plat AND j.id='".$_GET['id']."';";
	$get=mysqli_query($con,$consulta);
	$get=mysqli_fetch_array($get,MYSQLI_ASSOC);
?>
<p><h1><?php echo $get['nombre']; ?></h1></p>
<p><?php echo $get['plataforma']; ?></p>
<p><img src=<?php echo $get['imagen']; ?>></p>
<p><?php echo $get['publicacion']; ?></p>
<p><?php echo $get['sinopsis']; ?></p>
<?php
	$juego=$_GET['id'];
	$avg=mysqli_query($con, "SELECT ROUND(AVG(puntuacion), 1) media FROM puntos_juego WHERE id_juego=$juego;");
	$avg=mysqli_fetch_assoc($avg);
	echo "Puntuacion:";
	if($avg['media']==null)
		echo "N/A";
	else
		echo $avg['media'];


	if(isset($_SESSION['user'])){
		$user=$_SESSION['user'];

		$query="SELECT favorito, completado, coleccion, puntuacion FROM lista l, puntos_juego p WHERE l.id_usuario=p.id_usuario AND l.id_usuario='$user' AND l.id_juego=$juego AND p.id_usuario='$user' AND p.id_juego=$juego;";
		$select=mysqli_query($con,$query);
		$actualiza=mysqli_fetch_assoc($select);

		//Añadir juego a lista
		if(isset($_POST['enviar'])){
			$fav=$_POST['favorito'];
			$completado=$_POST['completado'];
			$cole=$_POST['coleccion'];
			$punt=$_POST['punt'];

			if(!strcmp($_POST['enviar'],"Actualizar juego")){
				$query="UPDATE lista SET favorito=$fav,completado=$completado,coleccion=$cole WHERE id_usuario='$user' AND id_juego=$juego;";
				$query2="UPDATE puntos_juego SET puntuacion=$punt WHERE id_usuario='$user' AND id_juego=$juego;";
			}else{
				$query="INSERT INTO lista(id_usuario, id_juego, favorito, completado, coleccion) VALUES ('$user',$juego,$fav,$completado,$cole);";
				$query2="INSERT INTO puntos_juego(id_usuario, id_juego, puntuacion) VALUES ('$user',$juego,$punt);";
			}
			
			$add=mysqli_query($con,$query);
			$add2=mysqli_query($con,$query2);
			unset($_POST);
    		header("Refresh:0");

		}

		echo "<form action='/juegos.php?id=".$_GET['id']."' method='post' accept-charset='utf-8'>
				<input type='hidden' name='favorito' value=0>
				<input type='hidden' name='completado' value=0>
				<input type='hidden' name='coleccion' value=0>

				Puntuación : ";
				for ($i=1; $i <= 10; $i++) { 
					if ($actualiza['puntuacion']==$i) {
						echo $i."<input type='radio' name='punt' value=".$i." checked >";
					}else{
						echo $i."<input type='radio' name='punt' value=".$i." >";
					}
				}
		  echo "</br>
	  			<input type='checkbox' name='favorito' value=1 id='favorito'";
	  			if($actualiza['favorito'])
					echo "checked";
	  			echo ">
	  			<label for='favorito'>Favorito</label></br>
				
				<input type='checkbox' name='completado' value=1 id='completado'";
	  			if($actualiza['completado'])
					echo "checked";
	  			echo ">
				<label for='completado'>Completado</label></br>
				
				<input type='checkbox' name='coleccion' value=1 id='coleccion'";
	  			if($actualiza['coleccion'])
					echo "checked";
	  			echo ">
				<label for='coleccion'>Añadir a colección</label></br>";
				if(!mysqli_num_rows($select)){
				echo "</br><input type='submit' name='enviar' value='Añadir a mi lista'>";
				}else{
					echo "</br><input type='submit' name='enviar' value='Actualizar juego'>";
				}
			echo "</form>";
	}
?>