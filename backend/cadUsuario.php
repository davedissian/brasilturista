<?php
	require_once 'connection.php'; 
	
	//var_dump($_POST);
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	require_once 'checaEmail.php';
	$cpf = $_POST["cpf"];
	$sexo = $_POST["sexo"];
	$telefone = $_POST["telefone"];
	$ddd = $_POST["ddd"];
	$telefone = $ddd.$telefone;
	$senha1 = $_POST["senha"];
	$senha2 = $_POST["senha2"];

	$contanome = strlen($nome);

	if ($contanome > 50){
		echo "Nome muito grande";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "<script>
					alert('E-mail incorreto!');
					history.back();
				</script>";
	} else if (ChecaEmail($email,$connect)){
		echo "<script>
				alert('O e-mail $email já consta em nossa base de dados');
				location.href='../usuario.php'.;
			</script>";
	} else if ($senha1 != $senha2){
		echo "<script>
					alert('Senhas não conferem!!');
					history.back();
				 </script>";		
	} else {
		$senha = sha1($senha2);

		$query = "INSERT INTO usuario (nome, email,cpf,telefone,sexo,senha) VALUES ('$nome','$email','$cpf','$telefone','$sexo','$senha')";
		//echo $query; exit;
		$cadastrar = mysqli_query($connect,$query);
			if ($cadastrar==1){
				echo "
						<script>
							alert('Dados cadastrados com sucesso');
							location.href='../login.php';
						</script>
						";
			} else {
				echo "<script>
							alert('Dados não inseridos!!!);
							location.href='../usuario.php';
						</script>";
			}
	}
	