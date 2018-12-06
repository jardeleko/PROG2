<?php

	function mostraImagem($nomeArquivo){
		if ($nomeArquivo == '')
			return "default.jpeg";
	
		else
			return $nomeArquivo;
	}
	

	function mostraPreco($valor, $desconto){
		if ($desconto == 0){
			return "<span class 'precoFinal'> R$ ".str_replace(".", ",", number_format($valor, 2))."</span>";
		}
		else{
			return "De R$ <del> ".str_replace(".", ",", number_format($valor, 2))."</del> por <span class='precoFinal'>R$ ".str_replace(".",",", number_format($valor - $desconto, 2)). "</span>";
		}
	}
	function formataPreco($valor){
		return "R$ ".str_replace(".",",", number_format($valor, 2));
	}

	function mostraProduto($con, $id){
		$query = "SELECT * FROM produto WHERE $id=`id`";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);

		return $row;	
	}
	function mostraCliente($conexao, $id){
		$query = "SELECT * FROM cliente where $id = `id`";
		$result = mysqli_query($conexao, $query);
		$row = mysqli_fetch_array($result);

		return $row;
	}
?>
