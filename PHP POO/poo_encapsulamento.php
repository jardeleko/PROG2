<?php

class Pessoa{
	public $nome = "Rasmus Lerdorf";
	protected $idade = 49;
	private $senha = "123456";

	public function verDados(){
		echo $this->nome . "<br>";
		echo $this->idade . "<br>";	
		echo $this->senha . "<br>";			
	}	
}

$people = new Pessoa();

//echo $people->senha . "<br>";

$people-> verDados();
?>