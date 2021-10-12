<?php
	include '../assets/header.php'
?>

<body>
	<?php 
		if(isset($_GET["excluir"])){
			$idprod = htmlentities($_GET["excluir"]);
			require("../conecta.php");
			$mysqli->query("delete from tb_produtos where idpro = '$idpro'");
			echo $mysqli->error;
			if ($mysqli->error==""){
				echo "<div class='alerta sucesso'><b>Excluido</b> com Sucesso.
				<a href='../form.php'>
				<input type='button' value='Voltar'>
				</a></div><br />";
			}
		}
	?>
</body>
</html>