<?php
	require_once 'connection.php'; 
	require_once 'checaEmail.php';
	
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$cpf = $_POST["cpf"];
	$sexo = $_POST["sexo"];
	$telefone = $_POST["telefone"];
	$ddd = $_POST["ddd"];
	$telefone = $ddd."-".$telefone;
	$senha1 = $_POST["senha"];
	$senha2 = $_POST["senha2"];

	$contanome = strlen($nome);
	if($contanome > 50){
		echo "Nome muito grande";
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo 'Email incorreto';
	}else if (ChecaEmail($email,$connect)){
		echo "<script>
				alert('O e-mail $email já consta em nossa base de dados');
				location.href='../usuario.php';
			</script>";
	}else{
		if($senha1 == $senha2){
			$senha = sha1($senha2);
		} else {
			echo "<script>
					alert('Senhas não conferem!!');
					history.back();
				 </script>";
		}			
		$query = "INSERT INTO usuario (nome, email,cpf,telefone,sexo,senha) VALUES ('$nome','$email','$cpf','$telefone','$sexo','$senha')";
		$cadastrar = mysqli_query($connect,$query);
			if($cadastrar==1){
				echo "
						<script>
							alert('Dados cadastrados com sucesso');
							location.href='../index.php';
						</script>
						";
			}else{
				echo "<script>
							alert('Dados não inseridos!!!);
							location.href='../usuario.php';
						</script>";
			}
	}
	