<?php 
    
	session_start();
	
	// Variaveis de erro
	$erro_nome      = "";
	$erro_cpf     = "";
	$erro_validacao = 0;


	if(isset($_POST["botao"])){
		// Recebendo variaveis
		
		$_SESSION["nome"]   =   $_POST["nomecli"];
        $_SESSION["cpf"]    =   $_POST["cpfcli"];

		$nomecli	=	htmlentities($_POST["nomecli"]);
		$cpfcli		=	htmlentities($_POST["cpfcli"]);	

		// Sanitizações
		$nomecli   = 	filter_var($nomecli  , FILTER_SANITIZE_SPECIAL_CHARS);
		$cpfcli    = 	filter_var($cpfcli   , FILTER_SANITIZE_NUMBER_INT);

		// Validações
		if ($nomecli == "") {
			$erro_nome = "(Preencha o nome corretamente)";
			$erro_validacao ++;
		}
		if ($cpfcli < 1) {
			$erro_cpf = " (CPF precisa ser inteiro)";
			$erro_validacao ++;
		}

	}
	
	include '../assets/header.php'
?>

<body>

	<main class="container">

	<h2>Dados Cadastrais</h2>
	<form method="POST" action="adicionar.php">
		<div class="input-field">
			<input type="text"      name="nomecli" 	maxlength="50" 
			value="<?php 
					if (isset($nomecli)) 
					echo $nomecli 
					?>"
			placeholder="Nome<?php echo $erro_nome?>"> 
			<div class="underline"></div>
		</div>
		<div class="input-field">
			<input type="text"      name="cpfcli" 	maxlength="20" 
			value="<?php 
					if (isset($cpfcli)) 
					echo $cpfcli 
					?>"
			placeholder="CPF<?php echo $erro_cpf?>">
			<div class="underline"></div>
		</div><br>
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
			$mysqli->query("insert into tb_clientes values('', '$nomecli', '$cpfcli')");
			echo $mysqli->error;

			if($mysqli->error == ""){
				// Header("location: ../index.php");
				Header("location: mostra_dados.php");
			}
		}

	}
?>