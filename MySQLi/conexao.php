<?php
	$conn = new mysqli("localhost", "root", "", "dbphp7");

	if($conn->connect_error){
		echo "ERROR ". $conn->connect_error;
	}
// INSERINDO ATRAVEZ DO OPERADOR E FUNÇÃO DE INSERÇÃO
	
$stmt = $conn->prepare("INSERT INTO tb__usuarios(deslogin, dessenha) VALUES(?, ?)");
$stmt->bind_param("ss", $login, $pass);

$login = "user";
$pass = "12345";

$stmt->execute();

$login = "user2";
$senha = "as023admx021";

$stmt->execute();
?>