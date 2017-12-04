	<?php include 'script\php\template.php' ?>
	<?php
		if(isset($_SESSION['user'])){
			if (!isset($_GET['insertar']))
				echo '<a href="\foro.php?insertar=hilo" title="">Crear hilo nuevo</a>';
			if(isset($_GET['page'])){
				include 'script\php\forohub.php';
			}else{
				if(isset($_GET['insertar']))
					if($_GET['insertar']=="hilo")
						include 'script\php\foropostnuevo.php';
			}
		}
		if(isset($_GET['id']))
			include 'script\php\foropost.php';
	?>
</body>
</html>