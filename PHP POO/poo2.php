<?php

	class Carro{
		private $modelo;
		private $motor;
		private $ano;		
	

	public function setModelo($modelo){
		$this->modelo= $modelo;
	}
	public function getModelo(){
		return $this->modelo;
	}

	public function setMotor($motor){
		$this->motor=  $motor;
	}
	public function getMotor():float{
		return $this->motor;
	}
	public function setAno($ano){
		$this->ano = $ano;
	}
	public function getAno():int{
		return $this->ano;
	}

	public function exibeCarro(){
		return array(
			'modelo' => $this->getModelo(),
			'motor' => $this->getMotor(),
			'ano' => $this->getAno()
			 );
	}

}

$gol = new Carro();
$gol->setModelo('Gol GT');
$gol->setMotor('1.6');
$gol->setAno('2005');



var_dump($gol->exibeCarro());
?>