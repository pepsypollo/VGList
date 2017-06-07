<?php
	if(isset($_POST['Inicia'])){
		$con=mysqli_connect('localhost','root','','twotter');
		mysqli_set_charset($con, "utf8");
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$check=mysqli_query($con,"SELECT user,pass FROM usuarios WHERE user='$user' AND pass='$pass';");
		$check=mysqli_fetch_array($check,MYSQLI_ASSOC);
		$nombre=$check['user'];

		if($nombre==""){
			echo "Usuario o contraseña incorrectos";
		}else{
			session_start();
			$_SESSION['user']=$nombre;
			echo("Login correcto");
			header("Refresh:1; url=dashboard.php");
		}
	}
?>
<form action="#" method="post" accept-charset="utf-8" id="form">
	<h3>Inicia sesion</h3>
	<label for="user">Nombre de usuario</label><br>
	<input type="text" name="user" id="user" required><br>
	<span class="error oculto" id="errorNombre"></span><br>
	<label for="pass">Contraseña</label><br>
	<input type="password" name="pass" id="pass" required><br>
	<span class="error oculto" id="errorPass"></span><br>
	<input type="submit" name="Inicia" value="Inicia" id="enviar">
</form>
¿No tienes cuenta? <a href="..\script\php\register.php">Regístrate</a>

<script type="text/javascript" src="..\script\js\valida.js"></script>
<script type="text/javascript">
	document.getElementById('user').onblur=validaNombre;
	document.getElementById('pass').onblur=validaPass;
	document.getElementById('enviar').onclick=enviarL;
</script>