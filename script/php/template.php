<?php include "conf.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo "$title" ?></title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="">Inicio</a></li>
			<li><a href="">Juegos</a></li>
			<li><a href="">Foro</a></li>
			<li><a href="">Noticias</a></li>
		</ul>
	<?php
		if(!isset($_SESSION['user']))
			include 'logreg.php';
		if(isset($_GET['cerrar'])){
			session_destroy();
			if(isset($_COOKIE['user'])){
				unset($_COOKIE['user']);
	    		setcookie('user','',time()-3600,'/');
				unset($_COOKIE['img']);
	    		setcookie('img','',time()-3600,'/');
	    	}
	?>
	<script>location.href="/";</script>
	<?php
		}
		if(isset($_SESSION['user'])){
	?>
		<ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
               	<a class="dropdown-toggle" data-toggle="dropdown"><img src=<?php echo $_SESSION['img'] ?> alt="" style="max-width:25px;max-height:25px"> <?php echo $_SESSION['user'] ?> <span class="caret"></a>
                <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                    <li><a href="">Perfil</a></li>
                    <li><a href='?cerrar'>Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
    <?php }else{ ?>
		<ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">Registrarse <span class="caret"></a>
                <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
                    <div class="col-lg-12">
						<?php include 'register.php' ?>
                    </div>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">Iniciar Sesión <span class="caret"></a>
                <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                    <div class="col-lg-12">
						<?php include 'login.php' ?>
                    </div>
                </ul>
            </li>
        </ul>
    <?php } ?>
	</div>