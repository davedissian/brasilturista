<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<style>
		
	</style>
    <title>Brasil Turista</title>
</head>
<body>
<?php
	require_once './backend/connection.php';
	require_once 'menu.html';
?>
<div class="container my-4">
<h3>Principais destinos</h3>

</p>Destinos por tipo de turismo</p>
	<ul>
		<?php
			$querytipos = "SELECT id_tipo_turismo, nome FROM tipo_turismo ORDER BY nome ASC";
			$executartipos = mysqli_query($connect,$querytipos);
			while($tt = mysqli_fetch_array($executartipos)){
				echo "<li><a href='./backend/tipos.php?tt=$tt[id_tipo_turismo]'>$tt[nome]</a></li>";	
			}
		?>
	</ul>
</p>Destinos por estado</p>
<ul>
<?php
	$queryestado = "SELECT DISTINCT estados.nome, estados.id_estado AS id FROM estados INNER JOIN cidades ON estados.id_estado = cidades.id_estado";
					//echo $queryestado;exit;
	$executarest = mysqli_query($connect,$queryestado);
	while($estados = mysqli_fetch_array($executarest)){
		echo "<li><a href='./backend/listaCidades.php?e=$estados[id]'>$estados[nome]</a></li>";
	}
?>
</ul>
</div>
<?php
require_once 'footer.html';
?>
</body>
</html>



