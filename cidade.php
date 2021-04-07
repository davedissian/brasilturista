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
		<form action="./backend/cadCidade.php" method="post" enctype="multipart/form-data">
			<p>
				Digite o nome da cidade: <input type="text" name="nome"/>
			</p>
			<p>
				Escolha o estado: 
				<select name="estado">
					<option value=""></option>
					<?php
						$query = "SELECT id_estado, nome FROM estados";
						$executa = mysqli_query($connect,$query);
						while($estados = mysqli_fetch_array($executa)){
							echo "<option value='$estados[id_estado]'>$estados[nome]</option>";
						}
					?>
				</select>
			</p>
			<p>
				Foto: <input type="file" name="foto"/>
			</p>
			<p>
				Descreva a cidade turistica: <textarea name="descricao"></textarea>
			</p>
			<p>
				Defina qual o tipo(s) de turismo da cidade:<br/>
				<?php
					$querytt="SELECT id_tipo_turismo, nome FROM tipo_turismo";
					$executar = mysqli_query($connect,$querytt);
					while($tt = mysqli_fetch_array($executar)){
						echo "<input name='tt[]' type='checkbox' value='$tt[id_tipo_turismo]'>$tt[nome] | ";
					}
				?>
			</p>			
			<input type="submit" value="Cadastrar"/>
		</form>
		<?php
		require_once 'footer.html';
		?>
	</body>
</html>