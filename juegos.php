	<?php include 'script\php\template.php' ?>
	<?php

		if(isset($_SESSION['user'])){
			echo '<a href="\juegos.php?insertar=juego" title="">Nueva entrada</a>';
		if(isset($_GET['page'])){
			include 'script\php\juegoshub.php';
		}else{
			if(isset($_GET['juego'])){
				entradaJuego($_GET['juego']);
			}else{
					if(isset($_GET['insertar']))
						if($_GET['insertar']=="juego")
							include 'script\php\juegonuevo.php';
				}
			}
		}
	?>
</body>
</html>