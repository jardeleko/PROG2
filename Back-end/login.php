<?php
	include "includes/cabecalho.php";

	if(isset($_POST['entrar'])){
		$erros = array();
		$login = mysqli_escape_string($conexao, $_POST['login']);
		$senha = mysqli_escape_string($conexao, $_POST['senha']);

		if(empty($login)){
			$erros[] = "<li>O campo de login está vazio</li>";
		}
		elseif(empty($senha)){
			$erros[] = "<li>O campo de senha está vazio</li>";
		}
		else{
			$sql = "SELECT login FROM cliente WHERE login = '$login'";
			$result = mysqli_query($conexao, $sql);

			if(mysqli_num_rows($result) > 0){
				$senha = md5($senha);

				$sql = "SELECT * FROM cliente WHERE login = '$login' AND senha = '$senha'";

				$result = mysqli_query($conexao, $sql);
				if(mysqli_num_rows($result) == 1){

					$dados = mysqli_fetch_array($result);

					$_SESSION['logado'] = true;
					$_SESSION['iduser'] = $dados['id'];
					header('Location: home.php');
					
					print_r($dados);
					}
				}
				else{
					$erros[] = "<li>Usuário não cadastrado, ou valores não coincidem.</li>";
				}
			}
		}
	
	?>

	<div class="container">
		<section class="col-1">
		
		</section>
		<section class="col-2">

			<?php 
				if (!empty($erros)){
					foreach ($erros as $erro) {
						echo $erro;					
					}
				}
			?>

			<center>
			<h2> Entre com seu usuário e senha</h2>	
    		<div class="box-parent-login">
    			<div class="boxlogin">

    			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    		   
    				<div class="formuser">
    					<label for="userLogin" class="label-alinhado"></label>
    					<input class="IOclass"  aria-label="Usuário" placeholder="Usuário" type="text" name="login">
    				</div>
     
    			<div class="formpassw">
    				<label for="userPassword" class="label-alinhado"></label>
    				<input class="IOclass" id="userPassword" aria-label="Senha" placeholder="Senha" name="senha" type="password">
    			</div>
  
     
    			<input value="entrar" name="entrar" class="btn" type="submit">
					
	
    		</form>
			    	<p class="txt-loginup">Não possui um usuário na Virtual Games?
    				<a href="cad_cliente.php">Cadastre-se agora</a>
    				</p>
    		</div>
			<br>
			<br>
   		 </div>
		</center>
		</section>
		<section class="col-3">
			<div>
				<br>
				<br>
				<br>
			</div>
		</section>

	</div>
<?php
	include "includes/rodape.php";
?>