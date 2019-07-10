<?php
	
	function trataNome($name){

		if(!$name){
			throw new Exception("Nenum nome foi informado", 1);
		}

	echo ucfirst($name)."<br>";
	}

	try{

		trataNome("Lek1234");
		trataNome("");

		
	} catch (Exception $e){

		echo $e->getMessage();
		echo "<br>";

	} finally {

		echo "Executou o try!";
	}
?>