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
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$perfil = $_POST['perfil'];
		$assunto = $_POST['assunto'];
		$horario = $_POST['horario'];
		$mensagem = $_POST['mensagem'];


		if($_SESSION['logado'] == true && $perfil == 'cliente'){
			$id = $_SESSION['iduser'];

			$sql = "UPDATE cliente SET ajuda = '$mensagem' where id='$id'";
			$result = mysqli_query($conexao, $sql);

			$query = 'INSERT INTO ajuda(nome, email, telefone, perfil, assunto, horario, mensagem) VALUES("'.$nome.'","'.$email.'","'.$telefone.'","'.$perfil.'","'.$assunto.'","'.$horario.'",	"'.$mensagem.'")';
			$resultado = mysqli_query($conexao, $query);
			mysqli_close($conexao);
		}
		elseif ($_SESSION['logado']== false && $perfil =='cliente'){
			$sql = "UPDATE cliente SET ajuda = '$mensagem' where email = '$email'";
			$result = mysqli_query($conexao, $sql);

			$query = 'INSERT INTO ajuda(nome, email, telefone, perfil, assunto, horario, mensagem) VALUES("'.$nome.'","'.$email.'","'.$telefone.'","'.$perfil.'","'.$assunto.'","'.$horario.'",	"'.$mensagem.'")';
			$resultado = mysqli_query($conexao, $query);
			mysqli_close($conexao);
		}

		else{
			$query = 'INSERT INTO ajuda(nome, email, telefone, perfil, assunto, horario, mensagem) VALUES("'.$nome.'","'.$email.'","'.$telefone.'","'.$perfil.'","'.$assunto.'","'.$horario.'",	"'.$mensagem.'")';
			$resultado = mysqli_query($conexao, $query);
			mysqli_close($conexao);

			echo($resultado);
			//die();
		}	
	}

		
	?>
		
		<section class="col-2">
		
			<nav class="ajude">
			<h1 id="cont"><strong>Como podemos ajudar?</strong></h1>
				
				<form action="ajuda.php" method="POST">
			
					<div>
						<label for="name" class="label-alinhado"> Nome: </label>
						<input type="text" name="nome" id="nome">
					</div>

					<div>
						<label for="email" class="label-alinhado"> E-mail: </label>
						<input type="email" name="email" id="email" required="">
					</div>

					<div>
						<label for="telefone" class="label-alinhado"> Telefone: </label>
						<input type="text" name="telefone" value="(49)" id="telefone">
					</div>
		
					<br>
			
					<div>
					<fieldset>
					<legend>Perfil </legend>
						<label><input type="radio" name="perfil" value="cliente">	Já é nosso cliente</label><br>
						<label><input type="radio" name="perfil" value="primeirax"> Primeira visita</label><br>
						<label><input type="radio" name="perfil" value="outros">Outros</label><br>
					</fieldset>
					</div>
					
					<br>
					<div>
						<label for="assunto" class="label-alinhado" >Assunto </label>
						<select name="assunto" id="assunto"> 
						<option>Selecione </option>
						<option value ="duvidas">Dúvidas</option>
						<option>Críticas</option>
						<option>Sugestões</option>
						</select>
					</div>
					
					<br>
			
					<div>
						<p>Horário(s) preferencial(is) para retorno telefônico</p>
						<label> <input type="checkbox" name="horario" value="manha" >Manhã</label>
						<label> <input type="checkbox" name="horario" value="tarde" >Tarde</label>
						<label><input type="checkbox" name="horario" value="noite" >Noite</label>
					</div>
		
					<br>
			
					<div>
						<label> Mensagem:
							<textarea name="mensagem" rows="10" cols="60"></textarea>
						</label>
					</div>
					<br>
			
					<div>
						<input type="submit" value="Enviar">
						<input type="reset" name="Limpar campos">
					</div>
		
				</form>
			</nav>	
		<br>
		<br>
		<br>
		<br>
		</section>
	<?php
	include "includes/maispedidos.php";
	?>

	</div>
	
<?php
include "includes/rodape.php";
?>