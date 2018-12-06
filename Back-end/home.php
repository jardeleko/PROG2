<?php
include "includes/cabecalho.php";
	
?>

	<div class="container">
			<?php
			include "includes/menu_lateral.php"; 
			?>	

		<section class="col-2">
			
			
			<?php 

			if(isset($_GET['menu'])){
				$catSelecionada = $_GET['menu'];
				$titulo = $CATEGORIAS[$catSelecionada];
			}

			elseif (isset($_GET['busca'])){
				$titulo = "Resultado da busca por \"{$_GET['busca']}\" ";
			}else{
				$titulo = "Lista de produtos";
			}
			?>

			<h2><?=$titulo;?></h2>

			<div class="listaPROD">
				
			<?php
			include "includes/functions.php";

			$sql = "select * from produto ";

			
			if(isset($catSelecionada))
			 	$sql.= "where $catSelecionada is true";	
			elseif(isset($_GET['busca']))
				$sql.= "WHERE nomeProd LIKE '%{$_GET['busca']}%'";
			else 
				$sql.= "ORDER BY id ASC";
		
			$result = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($result) == 0){
				echo "<p>Este produto não esta cadastrado</p>";
				echo $sql;
			}else{
				while ($produto = mysqli_fetch_array($result)){

			?>

				<div class="produto">
					<a href="produto.php?id=<?=$produto['id'];?>">
						<figure>,
							
							<img src="img/produtos/<?=mostraImagem($produto['imagem']);?>"  alt="<?=$produto['nomeProd'];?>"><hr>

							<figcaption>/<?=$produto['nomeProd'];?> <span class="preco">
								<?=mostraPreco($produto['valor'], $produto['desconto']);?>
									
								</span>
							</figcaption>
						</figure>
					</a>
					</div>  		
					<?php 
					}
				}
				?>
			</div>
		</section>
	
	<?php

		include "includes/maispedidos.php";
	?>
	</div>
<?php	
include "includes/rodape.php";
?>
