<?php
	function subirImg($form,$guardar,$nombre){
		$rutaImg=$guardar.$nombre;
		$valida=true;
		$formato=pathinfo($rutaImg,PATHINFO_EXTENSION);

		//Check if image file is a actual image or fake image
		$check=getimagesize($_FILES[$form]["tmp_name"]);
		if($check!==false){
			echo"File is an image - ".$check["mime"].".";
			$valida=true;
		}else{
			echo"File is not an image.";
			$valida=false;
		}

		//Check if file already exists
		if(file_exists($rutaImg)){
			unlink($rutaImg);
			$valida=false;
		}

		//Check file size
		if($_FILES[$form]["size"]>500000){
			echo"Sorry, your file is too large.";
			$valida=false;
		}

		//Allow certain file formats
		if($formato!="jpg" && $formato!="png" && $formato!="jpeg" && $formato!="gif"){
			echo"Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$valida=false;
		}

		//Check  if $valida is set to 0 by an error
		if(!$valida){
			return false;

		//if everything is ok, try to upload file
		}else{
			if(move_uploaded_file($_FILES[$form]["tmp_name"],$rutaImg)){
				echo"Thefile".basename($_FILES[$form]["name"])."has been uploaded.";
			}else{
				echo"Sorry,there was an error uploading your file.";
			}
			return $rutaImg;
		}
	}
?>