<?php
	//Cookies
	if(isset($_COOKIE['user'])){
		$_SESSION['user']=$_COOKIE['user'];
		$_SESSION['img']=$_COOKIE['img'];
	}
	//Log in
	if(isset($_POST['Inicia'])){
		$userlog=$_POST['userlog'];
		$passlog=$_POST['passlog'];
		$check=mysqli_query($con,"SELECT user,pass,img FROM usuario WHERE user='$userlog' AND pass='$passlog';");
		$check=mysqli_fetch_array($check,MYSQLI_ASSOC);
		$nombre=$check['user'];

		if($nombre==""){
			echo "Usuario o contraseña incorrectos";
		}else{
			$_SESSION['user']=$nombre;
			$_SESSION['img']=$check['img'];
			if(isset($_POST['keep'])){
				setcookie('user', $_SESSION['user'], time()+60*60*24*365,'/');
				setcookie('img', $_SESSION['img'], time()+60*60*24*365,'/');
			}
		}
	}

	//Registro
	if(isset($_POST['Registro'])){	
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];

		$imgTam=$_FILES['foto']['size'];
		$imgName=$_FILES['foto']['tmp_name'];
		echo "1:".$imgTam." 2:".$imgName;
		$add=mysqli_query($con,"INSERT INTO usuario (user,email,pass) VALUES ('$user','$email','$pass');");
		
		if($add){
			$_SESSION['user']=$user;
        	$validaImg=subirImg('foto','img/user/',$user);
        	echo $validaImg;
?>
<script>window.alert("Registro realizado correctamente, ahora puedes iniciar sesión")</script>
<?php
			echo "Añadido";
		}else{
?>
<script>window.alert("Este nombre de usuario ya esta registrado")</script>
<?php
		}
	}
?>