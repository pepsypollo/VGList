<?php
	if(isset($_POST['Registro'])){
		$con=mysqli_connect('localhost','root','','twotter');
		mysqli_set_charset($con, "utf8");
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];
		$add=mysqli_query($con,"INSERT INTO usuarios (email,user,pass) VALUES ('$email','$user','$pass');");
		if($add){
			session_start();
			$_SESSION['user']=$user;
			echo "Añadido";
			header("Refresh:2; url=dashboard.php");
		}else{
			echo "Usuario cogido";
		}
	}
?>
<div id="formul">
	<form action="#" method="post" accept-charset="utf-8">
	<h3>Regístrate para acceder</h3>
	<label for="user">Nombre de usuario</label><br>
	<input type="text" name="user" id="user" required><br>
	<span class="error oculto" id="errorNombre"></span><br>

	<label for="email">Email</label><br>
	<input type="email" name="email" id="email" required><br>
	<span class="error oculto" id="errorEmail"></span><br>

	<label for="foto">Imagen de perfil</label><br>
	<input type="file" name="Foto" id="foto">
	<span class="error oculto" id="errorNombre"></span><br>

	<label for="pass">Contraseña</label><br>
	<input type="password" name="pass" id="pass" required><br>
	<span class="error oculto" id="errorPass"></span><br>

	<label for="passc">Vuelve a escribir la contraseña</label><br>
	<input type="password" name="passc" id="passc" required><br>
	<span class="error oculto" id="errorPassc"></span><br>

	<input type="checkbox" name="term" id="term" required>
	<label for="term">Aceptar términos de uso</label><br>

	<input type="submit" name="Registro" value="Registro" id="enviar">
	</form>
</div>
<script type="text/javascript" src="..\..\script\js\valida.js"></script>
<script type="text/javascript">
	document.getElementById('user').onblur=validaNombre;
	document.getElementById('pass').onblur=validaPass;
	document.getElementById('email').onblur=validaEmail;
	document.getElementById('passc').onblur=validaPassc;
	document.getElementById('enviar').onclick=enviarR;
</script>