<?php
function soma(int ...$valores): string{
	return array_sum($valores);
}

echo var_dump(soma(2, 4));
echo "<br>";


echo soma(22, 44);
echo "<br>";

echo soma(24,54);
echo "<br>";

echo soma(23, 46);
echo "<br>";

echo soma(27, 43);
echo "<br>";

?>