<div class="text-center"><h3><b>Inicia sesion</b></h3></div>
<form action="#" method="post" accept-charset="utf-8" id="form">
	<label for="userlog">Nombre de usuario</label><br>
	<input type="text" name="userlog" id="userlog" required><br>
	<span class="error oculto" id="errorNombre"></span><br>
	<label for="passlog">Contraseña</label><br>
	<input type="password" name="passlog" id="passlog" required><br>
	<span class="error oculto" id="errorPasslog"></span><br>
	<input type="checkbox" name="keep" id="keep">
	<label for="keep">No cerrar sesión</label><br>
	<input type="submit" name="Inicia" value="Inicia" id="enviar">
</form>

<script type="text/javascript" src="..\..\script\js\valida.js"></script>
<script type="text/javascript">
	document.getElementById('userlog').onblur=validaNombre;
	document.getElementById('passlog').onblur=validaPass;
	document.getElementById('enviar').onclick=enviarL;
</script>