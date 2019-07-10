<?php

$name = "img";
	
	if(!is_dir($name)){
		mkdir($name);

		echo "Diretório criado";
	}
	else{
		//rmdir($name);
		echo "Já existe um diretório ".$name;
	}

?>
