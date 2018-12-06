<!doctype html>
<html lang="pt-br">
<?php 
	include "conexao.php";
?>

<head>
	<title>projeto VirtuaGames</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/cartstyle.css">
	<link rel="stylesheet" href="css/style.css">
	<!--!link rel="stylesheet" href="css/bootstrap-theme.css"-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Press+Start+2P" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
	
</head>
	
<body> 
	<header>
			<center><strong>
		<h1> ✵ Virtual Games ✵</h1>
		<h4>Locadora de Consoles, PCs e Jogos</h4>
			</strong></center>


		<nav>
		<?php 

		@session_start();
			
			$id = $_SESSION['iduser'];
			$query = "SELECT * FROM cliente WHERE id = '$id'";
			$result = mysqli_query($conexao, $query);
			$cliente = mysqli_fetch_array($result);
		
		/*	if($cliente['imgPerfil'] == ''){
				$cliente['imgPerfil'] = 'perfilfunction.jpg';
			}else{
				return $cliente['imgPerfil'];
			}*/

		?>	
			<div class="circle"> 
				<img src="img/<?=$cliente['imgPerfil']?>">
			</div>
		
		 


		</nav>
		
		
		<p><a href="home.php"><img src="img/logoProg.png" width="150" height="78"> </a></p>
		
			<ul class="menu-enter">
			<?php 
				$query = "SELECT * FROM cliente WHERE id = '$id'";
				$result = mysqli_query($conexao, $query);
				$cliente = mysqli_fetch_array($result);

				if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
					echo "<li><a href='alteraDados.php'>Conta</li>";
				}		
				else{
					echo "<li><a href='cad_cliente.php'> Crie a sua conta </a></li>";
				}
				if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
					echo "<li><a href='sair.php'><span class='small'>Sair</span></a></li>";
				}else{
					echo "<li><a href='login.php'> Entre </a></li>";
				}
				 ?>				
				<li><a href="ajuda.php"> Ajuda </a></li>
				<li><a href="descricao.php"> Quem somos </a></li>
				<li><p class="carrinho"> <a href="carrinho.php"> <img src="img/cart.png" width="32"></a></p></li>
			</ul>
		

	</header>
