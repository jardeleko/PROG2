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


class Programador extends Pessoa{

		public function verDados(){

		echo get_class();
		echo "<br>";
		echo $this->nome . "<br>";
		echo $this->idade . "<br>";	
		echo $this->senha . "<br>";			
	}	

}

$people = new Programador();

//echo $people->senha . "<br>";

$people->verDados();
?>