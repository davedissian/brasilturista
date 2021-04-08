<?php
	require_once "./backend/connection.php";
?>
<!DOCTYPE html>
<html>
	<head>
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>tinymce.init({selector:'textarea'});</script>
	</head>
<body>
	<?php
	require_once 'menu.html';
	?>

	<div class="container mt-4 mb-5">
		<form class="container box" action="./backend/cadCidade.php" method="post" enctype="multipart/form-data">
			<label for="nome" class="col-form-label">Nome da cidade</label>
			<input type="text" class="form-control" name="nome"/>

			<label for="estado" class="col-form-label">Estado</label>
			<select class="form-select" name="estado">
				<option value=""></option>
				<?php
					$query = "SELECT id_estado, nome FROM estados";
					$executa = mysqli_query($connect,$query);
					while($estados = mysqli_fetch_array($executa)){
						echo "<option value='$estados[id_estado]'>$estados[nome]</option>";
					}
				?>
			</select>

			<label for="foto" class="col-form-label">Foto</label>
			<input type="file" class="form-control" name="foto"/>			
			
			<label for="descricao" class="col-form-label">Descrição</label>
			<textarea type="text" class="form-control" name="descricao"></textarea>
			
			<label for="tipo_turismo" class="col-form-label">Tipos de turismo</label>
			
				<?php
					$querytt="SELECT id_tipo_turismo, nome FROM tipo_turismo";
					$executar = mysqli_query($connect,$querytt);
					while($tt = mysqli_fetch_array($executar)){
						echo "<div class='form-check'>
								<input class='form-check-input' name='$tt[nome]' type='checkbox' value='$tt[id_tipo_turismo]'>
								<label class='form-check-label' for='$tt[nome]'>
								$tt[nome]
								</label>
							</div>";
					}
				?>
						
				<button type="submit" class="btn btn-primary my-3">Cadastrar</button>
		</form>
	</div>

	<?php
	require_once 'footer.html';
	?>
</body>
</html>