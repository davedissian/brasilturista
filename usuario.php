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
<form action="./backend/cadUsuario.php" method="post">
	<p>
		Digite o seu nome: <input type="text" name="nome"/>
	</p>
	<p>
		Digite a sua senha: <input type="password" name="senha" maxlength="8"/>
	</p>
	<p>
		Confirme sua senha: <input type="password" name="senha2" maxlength="8"/>
	</p>
	<p>
		Digite o seu e-mail: <input type="text" name="email"/>
	</p>
	<p>
		Digite o seu CPF: <input type="text" name="cpf"/>
	</p>
	<p>
		Digite o seu telefone: 
		<input type="text" name="ddd" size="2" maxlength="2" placeholder="DDD"/> - 
		<input type="text" name="telefone" placeholder="Número"/>
	</p>
	<p>
		Sexo:
		<select name="sexo">
			<option value="F">Feminino</option>
			<option value="M">Masculino</option>
			<option value="I">Indefinido</option>
		</select>
	</p>
	<input type="submit" value="Cadastrar"/>
</form>
<?php
require_once 'footer.html';
?>
</body>
</html>

