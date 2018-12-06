<?php
session_start();
if(!isset($_SESSION['logado'])){			
	header("Location: login.php");
}

include "includes/conexao.php";
if(isset($_POST['finalizar'])){
	
	$tipoEntrega = ($_POST['taxa'] == 0) ? 1 : 2;
	$dataPedido = date('Y-m-d H:i:s');
	
	$dataDevolucao = date('Y-m-d H:i:s', strtotime($dataPedido . ' + 10 days'));

	$sql = "insert into pedido (idCliente, taxaEntrega, tipoEntrega, dataPedido,dataDevolucao, status) values 
			({$_SESSION['iduser']}, {$_POST['taxa']}, $tipoEntrega, '$dataPedido','$dataDevolucao', 1)";
	$resultado = mysqli_query($conexao, $sql);
	if($resultado){
		$sql = "select numero from pedido where idCliente = {$_SESSION['iduser']} order by numero desc limit 1"; // pega 
		$resultado = mysqli_query($conexao, $sql);
		$numPedido = mysqli_fetch_array($resultado)[0];

		foreach ($_SESSION['carrinho'] as $idProduto => $item){
			
			$sql = "insert into pedido_itens (numPedido, idProduto, quantidade, valorLocacao) values 
					($numPedido, $idProduto, {$item['quantidade']}, {$item['valorFinal']})";
			$resultado = mysqli_query($conexao, $sql);
		}
		$mensagem = "Seu pedido foi finalizado com sucesso.";
		unset($_SESSION['carrinho']);
	}
	else {
		$mensagem = "Erro ao gravar o pedido";
	}
}
include "includes/cabecalho.php";
?>
	
	<div class="container">
		<?php
		include "includes/menu_lateral.php";
		?>		

		<section class="col-2">
		<?php
		if(!isset($_POST['finalizar']) && !isset($_SESSION['carrinho'])){
			echo "<h2>Seu carrinho está vazio!</h2>";
		}
		else{
		?>
			<h2>Fechar pedido</h2>

			<?php
				$end = "";

				if(isset($_SESSION['iduser']) && $_SESSION['iduser'] != ''){
					$sql = "select endereco, bairro from cliente where id = {$_SESSION['iduser']}";
					$resultado = mysqli_query($conexao, $sql);
					$end = mysqli_fetch_assoc($resultado);

			}

			if(!isset($_POST['finalizar'])){ 
			?>

			<hr>
			<p><strong>Escolha o tipo de entrega:</strong></p>
			<form method="post">
				<div class="form-item">
				 <label><input type="radio" name="taxa" value="0" id="retirar" checked onclick="taxaEntrega(this.value)">Retirar na loja (grátis)</label><br>
				  <label><input type="radio" name="taxa" value="20" id="retirar" onclick="taxaEntrega(this.value)">Receber em <em><?=$end['endereco'] ." ". $end['bairro'];?></em> (<strong>R$ 20,00</strong>)</label>
				</div>
				<hr>
				<?php
				include "includes/functions.php";
				echo "<p><strong>Confira seus produtos:</strong></p>";
				echo "<div class='itemCarrinho'>
						<span class='produtoCarrinho'><strong>Produto</strong></span>
						<span class='qtdeCarrinho'><strong>Quantidade</strong></span>
						<span class='precoCarrinho'><strong>Total do item</strong></span>
					</div>";
				$total = 0;
				foreach($_SESSION['carrinho'] as $idProduto => $item){
				?>
					<div class="itemCarrinho" id="<?=$idProduto?>">
						<span class="produtoCarrinho"><?=$item['nome'];?></span>
						<span class="qtdeCarrinho"><?=$item['quantidade'];?></span>
						<span class="precoCarrinho"><?=formataPreco($item['quantidade'] * $item['valorFinal']);?></span>
					</div>
					<?php
					$total += $item['quantidade'] * $item['valorFinal'];
				}
				?>
				<div class="itemCarrinho total">
					<span>Total em produtos:</span>
					<span class="precoCart"><strong><?=formataPreco($total);?></strong></span>
					<input type="hidden" name="totalProdutos" id="totalProdutos" value="<?=$total;?>">
				</div>
				<div class="itemCarrinho total">
					<span>Taxa de Entrega:</span>
					<span class="precoCart" id="taxaExibida"><strong><?=formataPreco(0);?></strong></span>					
				</div>
				<div class="itemCarrinho total">
					<span>TOTAL DO PEDIDO:</span>
					<span class="precoCart" id="totalExibido"><strong><?=formataPreco($total);?></strong></span>	
				</div>
				<div class="botoes">
					<input type="hidden" name="finalizar" value="1">
					<a href="carrinho.php"><button type="button">Voltar para o carrinho</button></a>
					<button type="submit" name="finalizar">Finalizar pedido</button>
				</div>
				</form>
				<?php
				}
				else{ 
					echo $mensagem;
				}
		}
		?>
		</section>
		<?php
			include "includes/maispedidos.php";
		?>		
	</div>

<?php
include "includes/rodape.php";
?>
