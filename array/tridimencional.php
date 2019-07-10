<?php 
/*	$carros[0][1] = "GM";
	$carros[0][2] = "Cobalt";
	$carros[0][3] = "Onix";
	$carros[0][4] = "Camaro";

	$carros[1][1] = "Ford";
	$carros[1][2] = "Fiesta";
	$carros[1][3] = "Focus";
	$carros[1][4] = "Eco Sport";

echo $carros[0][3]; Array bidimencional, coluna 1 seleciona Marca, col-2 carro.

echo "<br>". end($carros[1]); end(); mostra a ultima posição.
*/
$pessoas = array();

array_push($pessoas, array(
		'nome' => 'Jardel',
		'idade' => 26
));  

array_push($pessoas, array(
	'nome' => 'Clinton',
	'idade' => 14
));

print_r($pessoas[0]['nome']);
?>