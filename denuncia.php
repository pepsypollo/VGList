<?php
	include 'script/php/template.php';
	if(isset($_SESSION['user'])){
		$user=$_SESSION['user'];
		$user_ban=$_GET['ban'];

?>
	<form action="#" method="post" accept-charset="utf-8">
		<label for="cuerpo">Escriba la razón de la denuncia</label><br>
		<textarea class='form-control' name="cuerpo" id="cuerpo" required></textarea><br>

		<input class='form-control' type="submit" name="Enviar" value="Enviar" id="enviar">
	</form>
<?php
		if(isset($_POST['Enviar'])){
			$query="INSERT INTO usuario_ban(id_user, id_user_ban, razon) VALUES ('$user','$user_ban','$_POST[cuerpo]');";
			$query=mysqli_query($con,$query);
			if ($query) {
				?>
				<script type="text/javascript">
					alert("Su denuncia ha sido enviada y sera revisada cuanto antes por un moderador, gracias.");
					document.location.href="/";
				</script>		
				<?php
			}
		}
	}else{
		?>
		<script type="text/javascript">document.location.href="/";</script>
		<?php
	}
?>