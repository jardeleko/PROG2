<?php
	@session_start();
	$_SESSION['logado'] = false;
	$_SESSION['iduser'] = 0;

	header('Location: home.php');
?>
