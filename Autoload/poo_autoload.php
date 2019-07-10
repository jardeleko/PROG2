<?php

function __autoload($nomeClasse){

	require_once("$nomeClasse.php");
}


$carro = new DelRey();
echo $carro->trocarMarcha(2);
?>