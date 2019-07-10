<?php

abstract class Animal {
	public function fala(){

		return "Som";
	}
	public function mover(){

		return "Anda";
	}
}

class Cachorro extends Animal{
	public function falar(){

		return "Au au";
	}

}

class Gato extends Animal{
		public function falar(){

		return "Miau Miau";
	}

}

class Passaro extends Animal{
	
	public function falar(){

		return "Canta";
	}

	function mover(){
		
		echo "Voa e " . parent::mover();
	}
}

$cat = new Gato();
$dog = new Cachorro();
$bird = new Passaro();

echo $dog->falar() . "<br>";
echo $dog->mover() . "<br>";
echo "<br>------------------------<br>";
echo $cat->falar() . "<br>";
echo $cat->mover() . "<br>";
echo "<br>------------------------<br>";
echo $bird->falar() . "<br>";
echo $bird->mover() . "<br>";
?>