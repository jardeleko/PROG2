<?php
$diaDaSemana = date("w");
switch ($diaDaSemana) {
	case '0':
	echo "Domingo";
		break;
	case '1':
	echo "Segunda";
		break;
	case '2':
	echo "terça-feira";
		break;
	case '3':
	echo "quarta-feira";
		break;
	case '4':
	echo "quinta-feira";
		break;
	case '5':
	echo "sexta-feira";
		break;
	case '6':
	echo "sabado";	# code...
		break;

	default:
	echo "Data invalida";
		break;
}
?>