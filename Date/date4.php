<?php

$dt = new DateTime();

echo $dt -> format("d/m/Y H:i:s");


// sistema de periodo de entrega do produto

$periodo = new DateInterval("P1D");
$dt-> add($periodo);


echo "<br>";

echo $dt -> format("d/m/Y H:i:s");

?>