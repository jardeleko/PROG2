<form>
	<input type="text" name="nome">
	<input type="date" name="dataNasc">
	<input type="submit" value="OK">
</form>
<?php
	if (isset($_GET)) {
		foreach ($_GET as $key => $value) { //key sempre Nome_Campo

			echo "Nome do campo " . $key . "<br>";

			echo "Valor do campo " . $value;

			echo "<br>";
		}
	}
?>