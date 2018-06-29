	<?php
		include 'script\php\template.php';
		
		if ($_SESSION['allow']) {
			?>
			<nav aria-label='breadcrumb'>
			  <ol class='breadcrumb'>
			    <li class='breadcrumb-item'><a href='/perfil.php'>Lista</a></li>
			    <li class='breadcrumb-item'><a href='/perfil.php?admin'>Administrar mod</a></li>
			  </ol>
			</nav>
			<?php
			if(isset($_GET['admin']))
				include 'script\php\perfilmoderador.php';
			else
				include 'script\php\perfillista.php';
		}else{
			include 'script\php\perfillista.php';
		}
	?>
</body>
</html>