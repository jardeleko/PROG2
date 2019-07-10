<?php 
require_once ("config.php");
 
echo session_save_path();

echo "<br>";

	switch (session_status()){
	 	
	 	case PHP_SESSION_DISABLED:
	 		echo "As sessoes estiveram desabilitadas";
	 		break;

	 	 case PHP_SESSION_NONE:
	 		echo "as sessoes estiveram habilitadas, mas nenhuma existe";
	 		break;
	 		
	 		case PHP_SESSION_ACTIVE:
	 		echo "as sessoes estiveram desabilitadas";
	 		break;
	 	

	}
?>