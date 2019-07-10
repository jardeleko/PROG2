<?php


class Endereco{
	
	private $logradouro;
	private $numero;
	private $cidade;

	public function __construct($a, $b, $c) {
		$this->logradouro = $a;
		$this->numero = $b;
		$this->cidade = $c;
	}
	public function __destruct(){

	}

	public function __toString(){
		return $this->logradouro.", ". $this->numero. ", ".$this->cidade;
	}
}

$meuEnd = new Endereco("Rua Benjamin Constant", "396e", "Chapecó");
//var_dump($meuEnd);

echo $meuEnd;
?>