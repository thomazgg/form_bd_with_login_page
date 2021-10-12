<?php
	include '../assets/header.php'
?>

<body>
	<form method="POST" action="pesquisar.php">
		Nome do Cliente: <input type="text" name="nomecli" maxlength="40" placeholder="digite o nome">
		<input type="submit" value="🔎 Pesquisar" name="botao">

	<?php 
		if(isset($_POST["botao"])){
			require("../conecta.php");
			$nomecli=htmlentities($_POST["nomecli"]);

			// gravando dados
			$query = $mysqli->query("select * from tb_clientes where nomecli like '%$nomecli%'");
			echo $mysqli->error;

			echo "</br><main><div>
				<table class='content-table'>
					<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>CPF</th>
					</tr>
					</thead>
			";
			while ($tabela=$query->fetch_assoc()) {
				$idcli = $tabela["idcli"];
			echo "
				<tbody>
				<tr onclick=location.href='calcula.php?id=$idcli'>
					<td align='center'>$tabela[idcli]</td>
					<td align='center'>$tabela[nomecli]</td>
					<td align='center'>$tabela[cpfcli]</td>
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