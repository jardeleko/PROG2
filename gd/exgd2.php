<?php 

$image = imagecreatefromjpeg("certificado.jpg");
$tileColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 10, 450, 150, "CERTIFICADO", $tileColor);
imagestring($image, 20, 440, 350, "Curso de php", $tileColor);
imagestring($image, 3, 440, 370, utf8_decode("Concluído em ").date("d/m/Y"), $tileColor); 
header("Content-Type: image/jpeg");

imagejpeg($image, "certificado-".date("Y-m-d").".jpg", 10);

imagedestroy($image);


?>