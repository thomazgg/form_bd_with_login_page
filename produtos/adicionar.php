<?php 
    
	session_start();

	// Variaveis de erro
	$erro_produto      	= "";
	$erro_cor     		= "";
	$erro_preco       	= "";
	$erro_validacao 	= 0;


	if(isset($_POST["botao"])){
		// Recebendo variaveis
		
		$_SESSION["produto"]   	=   $_POST["produto"];
		$_SESSION["cor"]  		=   $_POST["cor"];
        $_SESSION["preco"] 		=   $_POST["preco"];

		$produto		=	htmlentities($_POST["produto"]);
		$cor		=	htmlentities($_POST["cor"]);	
		$preco		=	htmlentities($_POST["preco"]);	

		// Sanitizações
		$produto   		= 	filter_var($produto  		, FILTER_SANITIZE_SPECIAL_CHARS);
		$cor  		= 	filter_var($cor 		, FILTER_SANITIZE_SPECIAL_CHARS);
		$preco    	= 	filter_var($preco   	, FILTER_SANITIZE_NUMBER_INT);

		// Validações
		if ($produto == "") {
			$erro_produto 		= "(Preencha o nome do produto corretamente)";
			$erro_validacao ++;
		}
		if ($cor == "") {
			$erro_cor 			= " (Preencha o tipo do produto corretamente)";
			$erro_validacao ++;
		}
		if ($preco < 1 ) {
			$erro_preco 		= " (Preço precisa ser inteiro)";
			$erro_validacao ++;
		}

	}
	
	include '../assets/header.php'
?>

<body>

	<main class="container">

	<h2>Dados do Produto</h2>
	<form method="POST" action="adicionar.php">
		<div class="input-field">
			<input type="text"      name="produto" 	maxlength="40" 
			value="<?php 
					if (isset($produto)) 
					echo $produto 
					?>"
			placeholder="Nome<?php echo $erro_produto?>"> 
			<div class="underline"></div>
		</div>
		<div class="input-field">
			<input type="text"     name="cor" maxlength="40" 
			value="<?php 
					if (isset($cor)) 
					echo $cor 
					?>"
					
			placeholder="Tipo<?php echo $erro_tipo?>">
			<div class="underline"></div>
		</div><br>
		<div class="input-field">
			<input type="text"      name="preco"  	maxlength="12" 
			value="<?php 
					if (isset($preco)) 
					echo $preco 
					?>"
			placeholder="Preço<?php echo $erro_preco?>">
			<div class="underline"></div>
		</div>
		<input type="submit" value="✔️ Salvar" name="botao">
		<a href="../form.php">
            <input type="button" value="⬅️ Voltar">
        </a>
	</form>
	</main>

</body>
</html>

<?php

	if(isset($_POST["botao"])){
		require("../conecta.php");

		// SEM ERRO DE VALIDAÇÃO => VAI PARA PROXIMA ETAPA
		if ($erro_validacao == 0) {
			// gravando dados
			$mysqli->query("insert into tb_produtos values('', '$produto', '$cor', '$preco')");
			echo $mysqli->error;

			if($mysqli->error == ""){
				// Header("location: ../index.php");
				Header("location: mostra_dados.php");
			}
		}

	}
?>