<?php 
	if(!isset($_SESSION['user'])){
		//Usuario no registrado

	}else{
		if($_SESSION['allow']){
			//Usuario administrador

		}else{
			//Usuario normal
			
		}
	}
?>