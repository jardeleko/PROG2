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

			if(isset($_GET["id"]) && $_GET["id"]!=""){
				$produto = mostraProduto($conexao, $_GET['id']);
					
			}

				//print_r($produto);
					
			$sql = "SELECT p.*, f.nomeFab AS fabricante FROM produto AS p INNER JOIN fabricante AS f ON p.idFab = f.id WHERE p.id = {$_GET['id']}";	
				
			$result = mysqli_query($conexao, $sql);
			$fabNome = mysqli_fetch_array($result);

			?>
		
			<h2>Descrição</h2>
			<div id="proDET">
				<table border=0 align=left width=1 height=327 ><tr><td bgcolor=black></td></tr>

					<figure class="imgDet">
						<img src="img/produtos/<?=mostraImagem($produto['imagem']);?>" widht="400" height="300"> 
					</figure>
				
			</table>
				
					<h4>Marca:
					  <?php 
						if(!empty($fabNome['fabricante'])){
						echo  $fabNome['fabricante'];
						} else{ 						
						echo "Não informado";
						}
						?></h4>
					<h4>Modelo: <?=$produto['nomeProd'];?> </h4>
					<h4>Informações: <?=$produto['descricao'];?></h4>
				


				<nav class="align-direita">
					<h4 class="texto">Preço: <?=mostraPreco($produto['valor'], $produto['desconto']);?></h4>
					<form action="adiciona.php" method="post" id="add-carrinho">
						<label for="quantidade">Quantidade:</label>
						<input type="number" name="quantidade" value="1" min="1" max="<?=$produto['qtde']?>">
						<input type="hidden" name="id" value="<?=$produto['id']?>">
						<input type="hidden" name="nome" value="<?=$produto['nomeProd']?>">
						<input type="hidden" name="valorFinal" value="<?=($produto['valor'] - $produto['desconto'])?>">
						<br><br>
						<input type="submit" value="Adicionar ao Carrinho" name="adicionar">
						<br><br>
					</form>

				</nav>	

		</div>			
		</section>
	
		<?php
		include "includes/maispedidos.php";
		?>
	</div>
<?php
include "includes/rodape.php";
?>
