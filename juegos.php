	<?php include 'script\php\template.php' ?>
	<?php

		if (!isset($_GET['insertar']))
			if(isset($_SESSION['user']))
				echo '<a href="\juegos.php?insertar=juego" title="">Insertar juego nuevo</a>';
		if(isset($_GET['page'])&&!isset($_GET['id'])){
			include 'script\php\juegoshub.php';
		}else{
			if(isset($_GET['insertar']))
				if($_GET['insertar']=="juego")
					include 'script\php\juegonuevo.php';
		
		}
		
		if(isset($_GET['id']))
			include 'script\php\juegoentrada.php';
	?>
</body>
</html>