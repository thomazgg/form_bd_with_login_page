<?php
	include '../assets/header.php'
?>

<body>
	<form method="POST" action="pesquisar.php">
		Nome do Produto: <input type="text" name="produto" maxlength="40" placeholder="digite o nome">
		<input type="submit" value="🔎 Pesquisar" name="botao">

	<?php 
		if(isset($_POST["botao"])){
			require("../conecta.php");
			$produto=htmlentities($_POST["produto"]);

			// gravando dados
			$query = $mysqli->query("select * from tb_produtos where produto like '%$produto%'");
			echo $mysqli->error;

			echo "</br><main><div>
				<table class='content-table'>
				<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Cor</th>
					<th>Preço</th>
				</tr>
				</thead>
			";
			while ($tabela=$query->fetch_assoc()) {
				$idpro = $tabela["idpro"];
			echo "
				<tbody>
				<tr onclick=location.href='calcula.php?id=$idpro'>
					<td align='center'>$tabela[idpro]</td>
					<td align='center'>$tabela[produto]</td>
					<td align='center'>$tabela[cor]</td>
					<td align='center'>$tabela[preco]</td>
				</tr>
				</tbody>";
			}
			echo "</table></div></main>";
		}
		?>
		<a href="../form.php">
		<input type="button" value="⬅️ Voltar">
		</a>
	</form>
</body>
</html>