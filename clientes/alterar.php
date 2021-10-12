<?php 
	require("../conecta.php");
	$nomecli	= "";
	$cpfcli		= "";

	if(isset($_GET["alterar"])){
		$idcli 		= htmlentities($_GET["alterar"]);
		$query		= $mysqli->query("select * from tb_clientes where idcli = '$idcli'");
		$tabela		= $query->fetch_assoc();
		$nomecli	= $tabela["nomecli"];
		$cpfcli		= $tabela["cpfcli"];
	}
	
	include '../assets/header.php'
?>

<body>
	<form method="POST" action="alterar.php">
				<input type="hidden"	name="idcli" 	value="<?php echo $idcli ?>">	
		Digite o nome: 	<input type="text" 		name="nomecli" 	value="<?php echo $nomecli ?>">
		Digite o cpf: 	<input type="text" 		name="cpfcli" 	value="<?php echo $cpfcli ?>">	
		<input type="submit" value="Salvar" name="botao">
		<a href ="../form.php">
			<input type="button" value="Voltar" name="botao">
		</a>

	<?php 
		if(isset($_POST["botao"])){

			$idcli   	= 	htmlentities($_POST["idcli"]);
			$nomecli	=	htmlentities($_POST["nomecli"]);
			$cpfcli		=	htmlentities($_POST["cpfcli"]);	

			$mysqli->query("update tb_clientes set 
			nomecli	= '$nomecli', 
			cpfcli  = '$cpfcli', 
			where idcli = '$idcli'");
			echo $mysqli->error;
			if ( $mysqli->error == "" ) {
				echo "<div class='alerta sucesso'><b>Alterado</b> com sucesso.";
			}
		}
	?>
	</form>
</body>
</html>