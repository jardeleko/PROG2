<?php

$con = new mysqli("localhost", "root", "", "dbphp7");

if($con->connect_error){
	echo "Error: " . $con ->connect_error;
}

$sql = $con->prepare("INSERT INTO cliente (nome, endereco, usuario, senha) VALUES(?, ?, ?, ?)");

$sql->bind_param("sssi", $nome, $endereco, $usuario, $senha);

$nome = "Jardel Osorio Duarte";
$endereco = "Benjamin Constant 396 e"; 
$usuario = "jardeleko";
$senha = "12342314";

$sql-> execute(); 
?>