<?php

	if(isset($_COOKIE['nome_cookie'])){

	$obj = json_decode($_COOKIE['nome_cookie']);

	echo $obj->minhaEmpresa;
	}

?>