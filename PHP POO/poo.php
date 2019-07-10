<?php
	  
	class Pessoa { 
	
	public $nome;//atributo

	public function falar(){//metodo
		
		return "O meu nome é ".$this->nome;
	}		
}

$Jardel = new Pessoa();

$Jardel->nome = "Jardel Duarte";

echo $Jardel->falar();

?>