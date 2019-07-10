<?php

	$img = scandir("img");

	$data = array();

	foreach ($img as $image) {
		if (!in_array($image, array(".", ".."))){

			$filename = "img".DIRECTORY_SEPARATOR . $image;

			$info = pathinfo($filename);

			$info["size"] = filesize($filename);

			$info["modified"] = date("d/m/Y H:i:s", filemtime($filename));

			$info["url"] = "http://localhost/DIR/". $filename;
			
			var_dump($info);
	
			array_push($data, $info);
		}
	}

	echo json_encode($data);
?>