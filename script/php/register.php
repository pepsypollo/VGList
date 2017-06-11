<div id="formul">
	<h3>Regístrate para acceder</h3>
	<form action="#" method="post" accept-charset="utf-8">
		<label for="user">Nombre de usuario</label><br>
		<input type="text" name="user" class="regform" id="user" required><br>
		<span class="error oculto tooltip" id="errorNombre"></span><br>

		<label for="email">Email</label><br>
		<input type="email" name="email" class="regform" id class="regform" class="regform"="email" required><br>
		<span class="error oculto" id="errorEmail"></span><br>

		<label for="foto">Imagen de perfil</label><br>
		<input type="file" name="foto" id="foto">
		<span class="error oculto" id="errorNombre"></span><br>

		<label for="pass">Contraseña</label><br>
		<input type="password" name="pass" id="pass" class="regform" class="regform" required><br>
		<span class="error oculto" id="errorPass"></span><br>

		<label for="passc">Vuelve a escribir la contraseña</label><br>
		<input type="password" name="passc" id="passc" class="regform" required><br>
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