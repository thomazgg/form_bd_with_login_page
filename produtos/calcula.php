<?php 

    // conexao com o banco de dados
    require("../conecta.php");

    $idpro   = htmlentities($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="sortcut icon" href="../assets/cadeado.png" />

    <title>Dados do Formulário</title>
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="../assets/style_all.css">
</head>

<body>

    <main class="container">

        <h2>Dados do Produto</h2>

        <div>
            <div class="field">
                <div class="campo">
                    <?php 
                    // executar comandos sql
                    // consulta registros da tabela
                    $query = $mysqli->query("select * from tb_produtos where idpro = '$idpro'");
                    echo $mysqli->error;

                    while ($tabela = $query->fetch_assoc()){
                        echo "<h3>Dados do Produto</h3>";
                        echo "Nome:     $tabela[produto] </br>";
                        echo "Cor:      $tabela[cor] </br>";
                        echo "Preço:    $tabela[preco] </br>";
                        echo "
                        <a href='excluir.php?excluir=$tabela[idpro]'>
                            <input type='button' value='❌ Excluir'>
                        </a>
                        <a href='alterar.php?alterar=$tabela[idpro]'>
                            <input type='button' value='📝 Alterar'>
                        </a>";
                    }
                    ?>
                    <a href="../form.php">
                        <input type="button" value="⬅️ Voltar">
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>