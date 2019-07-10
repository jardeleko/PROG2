<?php
$globenome = "teste";

	function teste(){
		global $globenome;
		echo $globenome;
	}
	function teste2(){
		global $globenome;
		echo $globenome.  " agora no teste 2";
	}

	teste2();
?>