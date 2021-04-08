<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Brasil Turista</title>
</head>
<body>
<?php
require_once 'menu.html';
?>
<div class="container mt-4 mb-5">
	<form class="container box" action="./backend/cadUsuario.php" method="post">
		<label for="nome" class="col-form-label">Nome</label>
		<input type="text" class="form-control" name="nome"/>

		<label for="senha" class="col-form-label">Senha</label>
		<input type="password" class="form-control" name="senha" maxlength="8"/>

		<label for="senha2" class="col-form-label">Confirme sua senha</label>
		<input type="password" class="form-control" name="senha2" maxlength="8"/>

		<label for="email" class="col-form-label">Email</label>
		<input type="text" class="form-control" name="email"/>

		<label for="cpf" class="col-form-label">CPF</label>
		<input type="text" class="form-control" name="cpf" maxlength="11" placeholder="Apenas numeros"/>

		<label for="telefone" class="col-form-label">Telefone</label>
		<input type="text" class="form-control" name="ddd" size="2" maxlength="2" placeholder="DDD"/> 
		<input type="text" class="form-control" name="telefone" placeholder="Telefone" maxlength="10"/>

		<label for="sexo" class="col-form-label">Sexo</label>
			<select class="form-select" name="sexo">
				<option value="F">Feminino</option>
				<option value="M">Masculino</option>
				<option value="I">Indefinido</option>
			</select>

		<button type="submit" class="btn btn-primary my-3">Cadastrar</button>
	</form>
</div>

<?php
require_once 'footer.html';
?>
</body>
</html>

