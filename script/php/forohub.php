<form action="#" method="get" accept-charset="utf-8">
	<input type="search" name="datos" placeholder="Buscar hilo">
	<input type="submit" name="Busqueda" value="Busqueda">
	<input type="hidden" name="count" value="5">
	<input type="hidden" name="page" value="1">
</form>
<h4>Entradas por página</h4>
<?php
	echo "<ol class='btn-group btn-breadcrumb'>";
	for ($i=10; $i <= 100; $i=$i+10) { 
		echo "<li class='btn btn-default";
		if($i==$_GET['count'])
			echo " active";
		echo "'><a href='foro.php?";
		if(isset($_GET['Busqueda']))
			echo "datos=$_GET[datos]&Busqueda=Busqueda&";
		echo "count=$i&page=1'>$i</a>";	
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


	$buscar="";
	if(isset($_GET['Busqueda']))
		$buscar=$_GET['datos'];
	
	$pagmax=mysqli_query($con,"SELECT id,nombre,publicacion,sinopsis,imagen,plataforma FROM juego j,plataforma p WHERE j.id_plat=p.n_plat and nombre LIKE '%$buscar%' ORDER BY j.nombre ASC;");
	$pagmax=mysqli_num_rows($pagmax);
	$pagmax=ceil($pagmax/$count);
	
	echo "<h3>Páginas</h3>";
	echo "<ol class='btn-group btn-breadcrumb'>";
	
	for ($i=1; $i <= $pagmax; $i++) { 
		echo "<li class='btn btn-default";
		if($i==$_GET['page'])
			echo " active";
		echo "'><a href='foro.php?";
		if(isset($_GET['Busqueda']))
			echo "datos=$_GET[datos]&Busqueda=Busqueda&";
		echo "count=$count&page=$i'>$i</a></li>";
	}
	echo "</ol>";

	$post=mysqli_query($con,"SELECT p.id,p.titulo,c.categoria,p.id_user FROM post p, categoria c WHERE p.n_cat=c.n_cat AND titulo LIKE '%$buscar%' ORDER BY p.id ASC LIMIT ".$count." OFFSET ".$page*$count." ;");
	$post=mysqli_fetch_all($post,MYSQLI_ASSOC);

	foreach ($post as $valor) {
		?>
		<div style="clear:both;" class='campobusc'>
			<p>
				<a href='foro.php?id=<?php echo $valor['id']; ?>'><?php echo $valor['titulo']; ?></a>
				<?php echo $valor['categoria']; ?>
				<?php echo $valor['id_user']; ?>
			</p>
		</div>
		<?php
	}

	echo "<ol class='btn-group btn-breadcrumb'>";
	
	for ($i=1; $i <= $pagmax; $i++) { 
		echo "<li class='btn btn-default";
		if($i==$_GET['page'])
			echo " active";
		echo "'><a href='foro.php?";
		if(isset($_GET['Busqueda']))
			echo "datos=$_GET[datos]&Busqueda=Busqueda&";
		echo "count=$count&page=$i'>$i</a></li>";
	}
	echo "</ol>";
?>