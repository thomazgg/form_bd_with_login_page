<?php  
	$domain="localhost";	// localização
	$user="root";			// usuário
	$password="";			// senha
	$database="bd_projeto";	// banco de dados	

	// instanciando a classe mysqli
	$mysqli = new mysqli($domain,$user,$password,$database);

	if($mysqli->connect_error){

		echo "Não foi possível conectar com o banco de dados ";
		echo $mysqli->connect_error; // mostra causa do erro
	}
?>