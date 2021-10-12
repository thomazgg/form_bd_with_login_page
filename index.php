<?php 
	$erro = "";

	if(isset($_POST["botao"])){
		$erro = "Usuário ou Senha incorretos";
	}
?>   
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/img/form.png" />

    <title>Login</title>
    
    <!-- Styles -->
	<link rel="stylesheet" href="assets/style_login.css">
</head>
<body>
    <main class="container">
        <h2>Login</h2>
        <form method="POST" action="index.php">
            <div class="input-field">
                <input type="text" name="usuario"
                    placeholder="Digite o usuário">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="senha"
                    placeholder="Digite a Senha">
                <div class="underline"></div>
            </div>

            <input type="submit" value="Continue" name="botao">
        </form>

        <div class="footer">
            <span><?php 
					if (isset($erro)) 
					echo $erro 
					?>
			</span>
        </div>
    </main>
	<?php 
	if(isset($_POST["botao"])){
		require("conecta.php");
		$usuario=htmlentities($_POST["usuario"]);
		$senha=htmlentities($_POST["senha"]);

		$query = $mysqli->query("select * from tb_usuario where usuario = '$usuario' and senha = '$senha'");

		if ($query->num_rows > 0){
			Header("location:form.php");
		}
	}	
	?>
</body>
</html>