	<?php include 'script\php\template.php' ?>
	<?php

		if (!isset($_GET['insertar']))
			if(isset($_SESSION['user']))
				if($_SESSION['allow']==1)
					echo '<a href="\noticias.php?insertar=noticia" title="">Insertar noticia</a>';
		if(isset($_GET['page'])){
			include 'script\php\noticiashub.php';
		}else{
			if(isset($_GET['insertar']))
				if($_GET['insertar']=="noticia")
					include 'script\php\noticianueva.php';
		
		}
		
		if(isset($_GET['id']))
			include 'script\php\noticiaentrada.php';
	?>
</body>
</html>