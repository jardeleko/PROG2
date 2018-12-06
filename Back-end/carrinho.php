<?php
include "includes/cabecalho.php";
?>

	<div class="container">
		
		<?php
			include "includes/menu_lateral.php";
		?>
			<section class="col-2">
				<?php

				include "includes/functions.php";
				if(!isset($_SESSION['carrinho'])){
					echo "<h2>O carrinho está vazio</h2>";
				}
				else {
					?>
						<h2>Meu carrinho</h2>
						<div class="itcart">
							<span class="prodCart"><strong>Produto</strong></span>
							<span class="qtdeCart"><strong>Quantidade</strong></span>
							<span class="precoCart"><strong>Valor</strong></span>
						</div>
					<?php
						$total = 0;
							var_dump($_SESSION);
						foreach($_SESSION['carrinho'] as $id => $item){
							?>
							<div class="itCart">
								<span class="produtoCart"><?=$item['nome'];?></span>
								<input type="number" id="qtd<?=$id;?>" min="1" maxlength="<?=$item['quantidade'];?>" style="width: 5em;" onchange="atualizaQuantidade(<?=$id;?>, this.value, <?=$item['valorFinal'];?>)" value="<?=$_SESSION['carrinho'][$id]['quantidade'];?>">
								<span class="precoCart" id="preco<?=$id;?>"><?=formataPreco($item['valorFinal'] * $item['quantidade']);?></span>
								<span class="excluirCart"><a

								 href="excluiCarrinho.php?id=<?=$id;?>" title="excluir item">✵</a></span>
							</div>							
							<?php
							$total += ($item['quantidade'] * $item['valorFinal']);
						}
						?>
						<div class="itemCarrinho total">
							<span>Total:</span>
							<span class="precoCart"><strong id="precoTotal"><?=formataPreco($total);?></strong></span>
						</div>
						<div class="botoes">
							<a href="home.php"><button>Continuar comprando</button></a>
							<a href="fecharPedido.php"><button>Finalizar pedido</button></a>
						</div>
					<?php
				}
				?>
			</section>					
			<?php
		include "includes/maispedidos.php";
		?>						
	</div>

	<!-- fim area central -->
<?php
include "includes/rodape.php";
?>	
