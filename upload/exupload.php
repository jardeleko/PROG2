<form method="POST" enctype="multipart/form-data">
	
	<input type="file" name="img">
	<button type="submit"> Send </button>

</form>

<?php

	if($_SERVER['REQUEST_METHOD'] === "POST"){

		$file = $_FILES['img'];
		
		if($file['error']){

			throw new Exception("Error: " .$file['error']);
		}

		$dirUpload = "uploads";

		if(!is_dir($dirUpload)){
				mkdir($dirUpload);
		}
		
		if (move_uploaded_file($file['tmp_name'], $dirUpload . DIRECTORY_SEPARATOR . $file['name'])){

			echo "upload ocorreu com sucesso";

		} else{ 
			throw new Exception("Erro no upload da imagem");

		}
			
	}
?>
