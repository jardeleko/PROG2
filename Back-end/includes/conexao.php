<?php
$host = "localhost";
$user = "viroot";
$senha = "virtua1604";
$database = "virtua";
$conexao = mysqli_connect($host, $user, $senha, $database) or die("Ocorreu um erro ao conectar-se ao banco de dados.");
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET mysql_set_charset_results=utf8');
?>
