	<?php
	//Cookies
	if(isset($_COOKIE['user']) && !isset($_SESSION['user'])){
		$sesion=mysqli_query($con,"SELECT user,img,allow FROM usuario WHERE user='".$_COOKIE['user']."';");
		$sesion=mysqli_fetch_array($sesion,MYSQLI_ASSOC);
		$_SESSION['user']=$sesion['user'];
		$_SESSION['img']=$sesion['img'];
		$_SESSION['allow']=$sesion['allow'];
	}
	//Log in
	if(isset($_POST['Inicia'])){
		$userlog=$_POST['userlog'];
		$passlog=$_POST['passlog'];
		$check=mysqli_query($con,"SELECT user,img,allow FROM usuario WHERE user='$userlog' AND pass='$passlog';");
		$check=mysqli_fetch_array($check,MYSQLI_ASSOC);
		$nombre=$check['user'];

		if($nombre==""){
			echo "Usuario o contraseña incorrectos";
		}else{
			$_SESSION['user']=$nombre;
			$_SESSION['img']=$check['img'];
			$_SESSION['allow']=$check['allow'];
			if(isset($_POST['keep'])){
				setcookie('user', $_SESSION['user'], time()+60*60*24*365,'/');
			}
		}
	}

	//Registro
	if(isset($_POST['Registro'])){	
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];
		$validaImg="/img/user/default.png";

		//Subir foto de perfil
		if($_FILES['foto']['name']!="")
			$validaImg=subirImg('foto','img/user/',$user);

		$add=mysqli_query($con,"INSERT INTO usuario (img,user,email,pass,allow) VALUES ('$validaImg','$user','$email','$pass',0);");
		
		//Registro correcto
		if($add){
			?><script>window.alert("Registro realizado correctamente, ahora puedes iniciar sesión")</script><?php
		//Usuario ya registrado
		}else{
			?><script>window.alert("Este nombre de usuario ya esta registrado")</script><?php
		}
	}
?>