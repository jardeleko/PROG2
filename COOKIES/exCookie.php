<?php

$data = array("minhaEmpresa"=> "VirtualWEB");

setcookie("nome_cookie", json_encode($data), time()+3600);

echo "Ok";


?>