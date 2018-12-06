<?php
include "includes/cabecalho.php";
include "includes/functions.php";
		
	if(isset($_SESSION["iduser"]) && $_SESSION["iduser"]!=""){
		$id = $_SESSION['iduser'];
		$cliente = mostraCliente($conexao, $id);
	
	}
	
?>
<?php
	if (isset($_POST['exclui'])){
		$sql = "delete from cliente where id = '$id'";
		mysqli_query($conexao, $sql);
		session_destroy();

	}

	if(isset($_POST['update']) && isset($_POST['nome']) && $_SESSION['logado'] == true){
		$nome = $_POST['nome'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$endereco = $_POST['endereco'];
		$bairro = $_POST['bairro'];			
		$email = $_POST['email'];
		$login = $_POST['login'];
		$senha = md5($_POST['senha2']);

		$imgPerfil = $_FILES['imgPerfil'];
		$destino = 'img/';
		$destino .= $imgPerfil['name'];
		$imgsql = $imgPerfil['name'];

		$tamanhoMax = 100000;
	 	$tipoAct = ["image/gif", "image/jpeg", "image/png","image/bmp", "image/jpg"];

	  	if($imgPerfil['error'] != 0){
	  	  echo "<p> Erro no upload do arquivo</p>";
	  	  switch ($imgPerfil['error']){
	    	case ' UP_ERR_INI_SIZE':
	    	    echo "O arquivo excede o tamanho";
	       		break;
	 //  	case 'UP_ERR_FORM_SIZE':
	 // 		echo "O arquivo enviado é muito grande";
	 //     	break;
	   //  	case 'UP_ERR_NO_FILE':

	     // 	echo "Nenhum arquivo existente";
	       // 	break;
	    	}
	    		exit;

	  	}

	  	if($imgPerfil['size'] == 0 || $imgPerfil['tmp_name'] == NULL){
	    	echo "<p>Nenhum arquivo enviado</p>";
	 		exit;
	  	}
	  	if($imgPerfil['size'] > $tamanhoMax){
	   	//	echo "<p>O arquivo é muito grande</p>";
	  	}

	  	if(!array_search($imgPerfil['type'], $tipoAct)){
	    	echo array_search($imgPerfil['type'], $tipoAct);
	    	echo "<p> O arquivo enviado não é do tipo (".$imgPerfil['type'].")aceito para upload. Os tipos aceitos são:" . print_r($tipoAct) . "</p>";
	  	}

	  	if(move_uploaded_file($imgPerfil['tmp_name'], $destino)){
	 	//  echo "O arquivo foi carregado com sucesso";
	  	//  echo "<img src='$destino'>";
	  	}
	
		if($_POST['senha'] == $_POST['senha2']){
			$senha = md5($_POST['senha2']);
		}
	//	else{
	//		echo "Erro na confirmação da senha";
	//	}
	
	$sql = "UPDATE cliente SET nome = '$nome', rg = '$rg', cpf ='$cpf', endereco = '$endereco', bairro = '$bairro', email = '$email', imgPerfil = '$imgsql', login ='$login' where id='$id'";
	$result = mysqli_query($conexao, $sql);
	}
		
?>
	<container>
	<div class="col-md-m3"> </div>

		<main class="col-md-m6">

			<form action="alteraDados.php" method="post" enctype="multipart/form-data">

				<fieldset>	
				<div>
					<label for="nome">Nome:
					<input type="text" name="nome" value="<?=$cliente['nome']?>"></label>
				</div>
				<div>
					<label for="rg">RG:
					<input type="text" name="rg" value="<?=$cliente['rg']?>"></label>
				</div>
				<div>
					<label for="cpf">CPF: 
					<input type="text" name="cpf" value="<?=$cliente['cpf']?>"></label>
				</div>
				
				<div>
					<label for="endereco">Endereço:
					<input type="text" name="endereco" value="<?=$cliente['endereco']?>"></label>
				</div>

				<div>
					<label for="bairro">Bairro:</label>
					<select name="bairro" id="bairro">
		           		<option value="<?=$cliente['bairro']?>">Selecionar bairro</option>
			            <option>Água Santa</option>
			            <option>Alvorada</option>
			            <option>Araras</option>
			            <option>Autódromo</option>
			            <option>Bela Vista</option>
			            <option>Belvedere</option>
			            <option>Boa Vista</option>
			            <option>Bom Pastor</option>
			            <option>Bom Retiro</option>
			            <option>Campestre</option>
			            <option>Centro</option>
			            <option>Cristo Rei</option>
			            <option>Desbravador</option>
			            <option>Dom Gerônimo</option>
			            <option>Dom Pascoal</option>
			            <option>Efapi</option>
			            <option>Eldorado</option>
			            <option>Engenho Braun</option>
			            <option>Esplanada</option>
			            <option>Fronteira Sul</option>
			            <option>Industrial</option>
			            <option>Jardim América</option>
			            <option>Jardim Europa</option>
			            <option>Jardim Itália</option>
			            <option>Jardins</option>
			            <option>Lajeado</option>
			            <option>Líder</option>
			            <option>Maria Goretti</option>
			            <option>Monte Belo</option>
			            <option>Palmital</option>
			            <option>Paraíso</option>
			            <option>Parque das Palmeiras</option>
			            <option>Passo dos Fortes</option>         
			            <option>Pinheirinho</option>
			            <option>Presidente Médici</option>
			            <option>Progresso</option>
			            <option>Quedas do Palmital</option>
			            <option>SAIC</option>
			            <option>Santa Maria</option>
			            <option>Santa Paulina</option>    
			            <option>Santo Antônio</option>
			            <option>Santos Dummond</option>
			            <option>São Cristóvão</option>
			            <option>São Lucas</option>
			            <option>São Pedro</option>
			            <option>Seminário</option>
			            <option>Trevo</option>
			            <option>Universitário</option>
			            <option>Vila Real</option>
			            <option>Vila Rica</option>
		       		</select>
		          	<span class="msg-erro" id="msg-bairro"></span>
       			</div>
				
				<div>
					<label for="email">Email:
					<input type="text" name="email" value="<?=$cliente['email']?>"></label>
				</div>
				
				<fieldset>
					<label for="imgPerfil"> Foto perfil: 
						<div >
							<img src="img/<?=$cliente['imgPerfil']?>" name="imgPerfil" widht="250" height="250" ></label>
						</div>
					<input type="file" name="imgPerfil" value="<?=$cliente['imgPerfil']?>">
					<br>
				</fieldset>

				<div>
					<label for="login"> Username:
					<input type="text" name="login" value="<?=$cliente['login']?>"></label>
				</div>

				<div>
					<label for="senha">Nova senha:
					<input type="password" name="senha" value="<?=$cliente['senha']?>" ></label>
					<br>
				</div>
				<div>
					<label for="senha">Confirmar senha:
						<input type="password" name="senha2">
					</label>
				</div>
				</fieldset>
				<button class="btn" type="submit" name="update">Atualizar cadastro</button>
			</form>
			<form action="alteraDados.php" method="POST">
				<button type="submit" name="exclui"> Excluir conta</button>
				
			</form>
		</main>

		<div class="col-md-m3"> </div>
	</container>
<?php
include "includes/rodape.php";

?>