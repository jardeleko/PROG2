<?php 
include "includes/cabecalho.php";

?> 
 <div class="container">
  <?php
   include "includes/menu_lateral.php";  
  ?>

<?php

  if(isset($_POST['nome']) && $_POST['nome'] != ''){
    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

      $erros = array();

     if(empty($_POST['cpf'])) {
        $erros[] = "Cpf não informado";
    }
 	
 	$cpf = $_POST['cpf'];

    $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;

    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    
    if (strlen($_POST['cpf']) != 11) {
        echo "length";
        $erros[] = "Tamanho insuficiente";
    }
    
    else if($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
           
           $erros[] = "Valor não existente";
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                $erros[] = "Cpf não existe";
            }
        }
      if($erros != 0){
		foreach ($erros as $erro) {
			echo $erro;
		}
     } else{
       return true;
      }
    }

     	
     	$imgPerfil = $_FILES['imgPerfil']; 
    	$destino = 'img/';
   		$destino .= $imgPerfil['name'];

   
    if ($_POST['senha'] != $_POST['senha2']){
      echo "As senhas não são compatíveis";
    } 
    //if ($_POST['senha'] == $_POST['senha2'])
    else{
      $password = md5($senha);
      $imgP = $imgPerfil['name'];
      $query = "INSERT INTO cliente(nome, rg, cpf, endereco, bairro, imgPerfil, email, login, senha)VALUES('$nome', '$rg', '$cpf', '$endereco', '$bairro', '$imgP', '$email', '$login', '$password')";
																									      
   //   echo $query;

      $result = mysqli_query($conexao, $query);
      mysqli_close($conexao);
     // print_r($_POST);
  }
  
  $tamanhoMax = 100000;
  $tipoAct = ["image/gif", "image/jpeg", "image/png","image/bmp", "image/jpg"];
  
  
  if($imgPerfil['error'] != 0){
    echo "<p> Erro no upload do arquivo</p>";
    switch ($imgPerfil['error']){
      case ' UP_ERR_INI_SIZE':
        echo "O arquivo excede o tamanho";
        break;
 //    case 'UP_ERR_FORM_SIZE':
 // 	echo "O arquivo enviado é muito grande";
 //     break;
   //  case 'UP_ERR_NO_FILE':

     //  echo "Nenhum arquivo existente";
       // break;
    }
    exit;
  }
  if($imgPerfil['size'] == 0 || $imgPerfil['tmp_name'] == NULL){
    echo "<p>Nenhum arquivo enviado</p>";
 	exit;
  }
  if($imgPerfil['size'] > $tamanhoMax){
    echo "<p>O arquivo é muito grande</p>";
  }
  if(!array_search($imgPerfil['type'], $tipoAct)){
    echo array_search($imgPerfil['type'], $tipoAct);
    echo "<p> O arquivo enviado não é do tipo (".$imgPerfil['type'].")aceito para upload. Os tipos aceitos são:" . print_r($tipoAct) . "</p>";
  }

  if(move_uploaded_file($imgPerfil['tmp_name'], $destino)){
 //   echo "O arquivo foi carregado com sucesso";
  //  echo "<img src='$destino'>";
  }


}

  if($_SESSION['logado'] == true){
    header('Location: alteraDados.php');
  }
?>


<section class="col-2">
  <h2> Dados para cadastro</h2><br />
  <div> 
    <form action="cad_cliente.php" method="POST" id="form-contato" enctype="multipart/form-data">
    <!-- Dados pessoais-->
      
      
      <fieldset id="cadastro1">
      <legend>Dados Pessoais</legend>
        <div class="form-item">
          <label for="nome" class="label-alinhado">Nome:</label>
          <input value="" type="text" id="nome" name="nome" size="50" placeholder="Nome completo">
          <span class="msg-erro" id="msg-nome"></span>
        </div>
  
        <div class="form-item">
          <label for="rg" class="label-alinhado">RG: </label>
          <input type="text" name="rg" id="rg" size="13" maxlength="13" placeholder="6418994">
          <span class="msg-erro" id="msg-registro"></span> 
        </div>  

        <div class="form-item">
          <label for="cpf" class="label-alinhado">CPF:</label>
          <input type="text" id= "cpf" name="cpf"  size="14" maxlength="14" placeholder="123.028.080-09">
          <span class="msg-erro" id="msg-cpf"></span>
        </div>

      </fieldset> 

      <br>
    <!-- ENDEREÇO --> 
      <fieldset id="cadastro2">
      <legend>Dados de Endereço</legend>
        
        <div class="form-item">
          <label for="endereco" class="label-alinhado">Rua:</label>
          <input type="text" id="endereco" name="endereco" size="50" placeholder="Nome da Rua   N°:123  -A">
          <span class="msg-erro" id="msg-endereco"></span>
        </div>
        
        <div class="form-item">
          <label for="bairro" class="label-alinhado">Bairro:</label>
          <select name="bairro" id="bairro">
            <option value="">Selecione o bairro</option>
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


        <div class="form-item">
          <label for="cep" class="label-alinhado">CEP: </label>
          <input type="text" id="cep" name="cep" size="9" maxlength="9" placeholder="89870-000">
          <span class="msg-erro" id="msg-cep"></span>
      </fieldset>
      
      <br />

<!-- DADOS DE LOGIN -->

      <fieldset id="cadastro3">
      <legend>Dados de login</legend>
        
        <div class="form-item">
          <label for="email" class="label-alinhado">E-mail: </label>
          <input type="text" id="email" name="email" placeholder="nome@dominio">
          <span class="msg-erro" id="msg-email"></span>
        </div>
        
        <div class="form-item">
          <label for="imagem">Imagem de perfil:</label>
          <input type="file" name="imgPerfil">
        </div>

        <div class="form-item">
          <label for="login" class="label-alinhado">Login de usuário: </label>
          <input type="text"  id="login" name="login" placeholder="Mínimo 6 caracteres">
          <span class="msg-erro" id="msg-login"></span>
        </div>

        <div class="form-item">   
          <label for="senha" class="label-alinhado">Senha: </label>
          <input type="password" id="senha" name="senha">
          <span class="msg-erro" id="msg-senha"></span>
        </div>
        
        <div>
          <label for="senha2" class="label-alinhado">Confirme a senha: </label>
          <input type="password" id="senha2" name="senha2">
          <span class="msg-erro" id="msg-confirm"></span>
        </div>  
       <div class="form-item">
          <label class="label-alinhado"></label>
          <div>
          <input type="submit" value="Finalizar Cadastro">

        </div>
      </fieldset>
        
      
	 
    </form>
  </div>  
	<br>
	<br>
  
  </section>

  <?php
  include "includes/menu_lateralDescricao.php";
  ?>
  </div>
<?php
include "includes/rodape.php";
?>
