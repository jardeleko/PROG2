<?php 

$image = imagecreatefromjpeg("certificado.jpg");
$tileColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagettftext($image, 32, 0, 320, 250, $tileColor, "fonts/Bevan/Bevan-Regular.ttf", "CERTIFICADO");
imagettftext($image, 32, 0, 370, 350, $tileColor, "fonts/Playball/Playball-Regular.ttf", "Curso PHP 7");
imagestring($image, 3, 440, 370, utf8_decode("Concluído em ").date("d/m/Y"), $tileColor); 

header("Content-Type: image/jpeg");

imagejpeg($image);

imagedestroy($image);


?>