<?php
	require_once "connection.php";
	//print_r($_GET);
	$id_estado = $_GET["e"];
	$query = "SELECT * FROM cidades WHERE id_estado = $id_estado";
	$executar = mysqli_query($connect, $query);
	$contem = mysqli_num_rows($executar);	
	while($cidades = mysqli_fetch_array($executar)){
		echo "<p>Destino Turistico: $cidades[nome]</p>";
		echo "<img height='200' src='../imagens/$cidades[foto]'/>";
	}
	
?>