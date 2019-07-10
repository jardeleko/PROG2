<?php
$pessoa = array(
'nome' => "Helton John",
'idade' => 40);

	foreach ($pessoa as $value) {
		if (gettype($value) === 'integer') $value +=10;

		echo $value ."<br>";
	}

print_r($value);
?>