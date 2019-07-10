<?php
/*	$pessoas = array();

array_push($pessoas, array(
		'nome' => 'Jardel',
		'idade' => 26
));  

array_push($pessoas, array(
	'nome' => 'Clinton',
	'idade' => 14
));

echo json_encode($pessoas);
*/

$json = '[{"nome":"Jardel","idade":26},{"nome":"Clinton","idade":14}]';
$data = json_decode($json, true);

print_r($data);
?>