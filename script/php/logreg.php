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
		$add=mysqli_query($con,"INSERT INTO usuario (email,user,pass) VALUES ('$email','$user','$pass');");
		/*if($add){
			$_SESSION['user']=$user;
			echo "Añadido";
			header("Refresh:2; url=dashboard.php");
		}else{
			echo "Usuario cogido";
		}*/
	}
?>