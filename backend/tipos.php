<?php
	require_once "connection.php";
	//print_r($_GET);
	$tipo_turismo = $_GET['tt'];
	$querytt="SELECT nome,foto FROM cidades AS c INNER JOIN cidade_tipo_turismo AS tt ON c.id_cidade = tt.id_cidade WHERE id_tipo_turismo = $tipo_turismo";
	$executatt = mysqli_query($connect,$querytt);
	$total = mysqli_num_rows($executatt);
	if($total!=0){
		while($tt=mysqli_fetch_array($executatt)){
			echo "<b>Destino turistico: </b> $tt[nome] <br/> ";
			echo "<img height='180' src='imagens/fotos_capa/$tt[foto]'/><br/><br/>";
		}
	}else{
		echo "Ops, nenhuma cidade cadastrada para esse tipo de turismo";
	}
?>