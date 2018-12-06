		<section class="col-1">
		
		<h2 id="menuAba">Categorias</h2>
			<nav class="menu-categorias">
				<nav>	
					<ul>
						<?php
						include "includes/categorias.php";
						foreach ($CATEGORIAS as $indice => $nomeCategoria) {
							echo "<li><a href='home.php?menu=$indice'>$nomeCategoria</a></li>";
						}
						?>
					</ul>
				</nav>
			</nav>
			
		</section>
