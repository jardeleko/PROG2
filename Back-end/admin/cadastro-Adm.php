<?php

include "cabecalho2.php";
?>
	<?php

		if (isset($_POST['enviar']) && empty($_POST['enviar']) != ''){
			
			$nomeProd = $_POST['nomeProd'];			
			$idFab = $_POST['idFab'];
			$descricao = $_POST['descricao'];
			$catConsole = (isset($_POST['catConsole']))? 1 : 0;
			$catDesk = (isset($_POST['catDesk']))? 1 : 0;
			$catGames = (isset($_POST['catGames']))? 1 : 0;
			$catPromo = (isset($_POST['catPromo']))? 1 : 0;
			$qtde = $_POST['qtde'];
			$valor = str_replace('.', ',', $_POST['valor']);
			$desconto = str_replace('.', ',', $_POST['desconto']);
			
			$imagem = $_FILES['imagem'];
			$destino = "../img/produtos/";
			$destino .= $imagem['name'];

			$tamanhoMax = 100000;
  			$tipoAct = ["image/gif", "image/jpeg", "image/png","image/bmp", "image/jpg"];
			
			$erros = array();
  			
			if($imagem['error'] != 0){
			    switch ($imagem['error']){
			    case ' UP_ERR_INI_SIZE':
			        $erros[] = "O arquivo excede o tamanho";
			   		break;
			    case 'UP_ERR_FORM_SIZE':
			        $erros[] = "O arquivo enviado é muito grande";
			        break;
			  	case 'UP_ERR_NO_FILE':
			      	$erros[] = "Nenhum arquivo existente";
				    break;
			    }
			    $erros[] = "<p> Erro no upload do arquivo</p>";
		    	exit;
		 	}

			if($imagem['size'] == 0 || $imagem['tmp_name'] == NULL){
		    	$erros[] = "<p>Nenhum arquivo enviado</p>";
		 		exit;
		  	}

		  	if($imagem['size'] > $tamanhoMax){
		    	$erros[] = "<p>O arquivo é muito grande</p>";
		  	}

		  	if(!array_search($imagem['type'], $tipoAct)){
		      	echo array_search($imagem['type'], $tipoAct);
		    	echo "<p> O arquivo enviado não é do tipo (".$imagem['type'].")aceito para upload. Os tipos aceitos são:" . print_r($tipoAct) . "</p>";
			}

		 	if(move_uploaded_file($imagem['tmp_name'], $destino)){
		    	//echo "O arquivo foi carregado com sucesso";
		  		//echo "<img src='$destino'>";
		 	}

			
			if(empty($nomeProd)){
				$erros[] = "O nome do produto não pode ser vazio";
					   
			}
			if($catConsole == 0 && $catDesk == 0 && $catGames == 0 && $catPromo == 0){
				$erros[] = "É preciso marcar pelo menos uma opção de categorias";
					  
			}

			if($erros != 1){
		  		$destino = $imagem['name'];
				include "conexao.php";
				$sql="INSERT INTO produto (nomeProd, idFab, imagem, descricao, catConsole,catDesk, catGames, catPromo, qtde, valor, desconto) VALUES ('$nomeProd', '$idFab', '$destino', '$descricao', '$catConsole', '$catDesk', '$catGames', '$catPromo', '$qtde', '$valor', '$desconto')";				
				$result = mysqli_query($conexao, $sql);
				mysqli_close($conexao);
				
				session_start();
				$_SESSION['id'] =  $idFab;
				header('location: mostrarExcluir.php');
			} else{
				foreach ($erros as $erro) {
					echo $erro;
				}
			}

		}
	?>
	<main>

	<h1 class="form-adm">Cadastramento de produtos: </h1>
	<form action="cadastro-Adm.php" method="post" enctype="multipart/form-data">

		<fieldset>		
			
				<div class="form-adm">	
					<label for="nomeProd" class="form-adm">Nome do Produto:</label>
					<input type="text" name="nomeProd" size="50">
				</div>
				
				<div>
				<select name="idFab" class="form-adm">	
					<option name="idFab" class="form-adm" value='1'>Fabricante não informado</option>
					<option name="idFab" class="form-adm" value="2">Acer</option>
					<option name="idFab" class="form-adm" value="3">Dell</option>
					<option name="idFab" class="form-adm" value="4">EA Sports</option>
					<option name="idFab" class="form-adm" value="5">Konami</option>
					<option name="idFab" class="form-adm" value="6">Microsoft</option>
					<option name="idFab" class="form-adm" value="7">Samsung</option>
					<option name="idFab" class="form-adm" value="8">Sony</option>							
				</div>
						<br>
				<div class="form-adm">
						<input type="file" name="imagem" size="50">
				</div>	
		    
		        <div class="form-adm">
			        <label name="descricao" class="form-adm">Descrição:</label>
					<textarea type="text" name="descricao" rows="5" cols="100"></textarea>
				</div>

				<div class="form-adm">
					<input type="checkbox" name="catConsole" value="1">
					<label for="catConsole">Console</label>
					<input type="checkbox" name="catDesk" value="1">
					<label for="catDesk">PCs</label>
					<input type="checkbox" name="catGames" value="1">
					<label for="catGames">Games</label>
					<input type="checkbox" name="catPromo" value="1">
					<label for="catPromo">Promoção</label>
				</div>

				<div class="form-adm">
					<label for="qtde" class="form-adm">Quantidade a ser cadastrado: </label>
					<input type="number" name="qtde" min="1">
				</div>

		        <div class="form-adm">
			        <label for="valor" class="form-adm"> Preço do produto:</label>
					<input type="text" name="valor" placeholder="0.00">
				</div>	

				<div class="form-adm">
			        <label for="desconto" class="form-adm">Valor do desconto:</label>
					<input type="text" name="desconto" placeholder="0.00">
				</div>	

			</fieldset>
			<button type="submit" name="enviar">Enviar Cadastro</button>
			<button type="reset">Limpar Campos</button>
		</form>

	</main>

<?php
	include "rodape.php";
?>