<?php

	$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
	$stmt = $conn->prepare("UPDATE  tb__usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID");

	$login = "Darwin";
	$password = "lek123";
	$id = 2;
	$pass = md5($password);

	$stmt->bindParam(":LOGIN", $login);
	$stmt->bindParam(":PASSWORD", $pass);
	$stmt->bindParam(":ID", $id);
	
	$stmt->execute();

	echo "insert successfully";

?>