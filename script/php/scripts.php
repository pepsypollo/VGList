<?php
	function subirImg($form,$guardar,$nombre){
		$formato=pathinfo($_FILES[$form]["name"],PATHINFO_EXTENSION);
		$rutaImg=$guardar.$nombre.".".$formato;

		//Check if file already exists
		if(file_exists($rutaImg)){
			unlink($rutaImg);
			return false;
		}

		//Check file size
		if($_FILES[$form]["size"]>500000){
			?><script>window.alert("Imagen demasiado grande")</script><?php
			return false;
		}

		//Allow certain file formats
		if($formato!="jpg" && $formato!="png" && $formato!="jpeg" && $formato!="gif"){
			?><script>window.alert("La imagen debe ser jpg, jpeg, png o gif.")</script><?php
			return false;
		}

		//Check  if $valida is set to 0 by an error
		if(!$valida){
			return false;

		//if everything is ok, try to upload file
		}else{
			if(move_uploaded_file($_FILES[$form]["tmp_name"],$rutaImg)){
				return $rutaImg;
			}else{
				return false;
			}
		}
	}
?>