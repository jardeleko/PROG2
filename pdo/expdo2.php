<?php

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
$stmt = $conn->prepare("INSERT INTO tb__usuarios(deslogin, dessenha) VALUES(:LOGIN, :PASSWORD)");

$login = "Darwin";
$password = "lek123";
 
 $stmt->bindParam(":LOGIN", $login);
 $stmt->bindParam(":PASSWORD", $password);

 $stmt->execute();

 echo "insert successfully";
?>