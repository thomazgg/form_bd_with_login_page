<?php 
	require("../conecta.php");
	$produto="";
	$cor="";
	$preco="";

	if(isset($_GET["alterar"])){
		$idpro 		= htmlentities($_GET["alterar"]);
		$query		= $mysqli->query("select * from tb_produtos where idpro = '$idpro'");
		$tabela		= $query->fetch_assoc();
		$produto	= $tabela["produto"];
		$cor		= $tabela["cor"];
		$preco		= $tabela["preco"];
	}
	
	include '../assets/header.php'
?>

<body>
	<form method="POST" action="alterar.php">

		<input type="hidden" name="idpro" 		  value="<?php echo $idpro ?>">	
		Nome: 	
		<input type="text" 	 name="produto" 	  value="<?php echo $produto ?>">
		Cor: 	
		<input type="text" 	 name="cor" 	  value="<?php echo $cor ?>">
		Preço: 	
		<input type="text" 	 name="preco" 	  value="<?php echo $preco ?>">	

		<input type="submit" value="Salvar" name="botao">
		<a href ="../form.php">
			<input type="button" value="Voltar" name="botao">
		</a>

	<?php 
		if(isset($_POST["botao"])){

			$idpro   		= 	htmlentities($_POST["idpro"]);
			$produto		=	htmlentities($_POST["produto"]);
			$cor			=	htmlentities($_POST["cor"]);	
			$preco			=	htmlentities($_POST["preco"]);

			$mysqli->query("update tb_produtos set 
			produto			= '$produto', 
			cor				= '$cor', 
			preco 			= '$preco' 
			where idpro 	= '$idpro'");
			echo $mysqli->error;
			if ($mysqli->error == "") {
				echo "<div class='alerta sucesso'><b>Alterado</b> com sucesso.";
			}
		}
	?>

	</form>
</body>
</html>
