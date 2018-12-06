<?php
	include "conexao.php";
	include "cabecalho2.php";
?>
<div class="container">
	<div class="col-1"></div>
		
		<div class="listPROD">
			
			<form action="#" method="post">
				<?php  
				$sql = "select * from produto";
				$produto = mysqli_query($conexao, $sql);


				?>
			</form>

		</div>

	<div class="col-3"></div>
</div>

<?php 
	include "rodape.php";
?>