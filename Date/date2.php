<?php

//$ts = strtotime("1991-11-21");
//$ts = strtotime("now");
$ts = strtotime("+1 day");
echo date("l, d/m/y", $ts);

?>