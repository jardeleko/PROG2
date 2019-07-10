
<?php 

$a = 10;

function trocaValr(&$a){
	return $a += 50;
}

echo trocaValr($a);

echo "<br>$a"; 

echo trocaValr($a);

echo "<br>$a"; 
?>