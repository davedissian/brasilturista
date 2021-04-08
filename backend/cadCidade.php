<?php	
	$foto = $_FILES['foto'];
	if ($foto['error']==4){
		echo "<script>
				alert('Por favor envie uma imagem!');
				history.back();
			 </script>";
	} else if (!preg_match("/(.)+(jpg|JPG|jpeg|JPEG|png|PNG|svg|SVG|BMP|bmp)/",$foto['name'])){   
		echo "<script>
				alert('Por favor envie uma IMAGEM!');
				history.back();
			 </script>";
	} else {
		$largura = 20000;
		$altura = 10000;
		$tamanho = 2000000;
		
		$dimensoes = getimagesize($foto['tmp_name']);
		
		if ($dimensoes[0]>$largura || $dimensoes[1]>$altura){
			echo "Envie uma imagem menor";
		} else {

			$extensao = explode(".",$foto["name"]);
			$nomearquivo= md5(uniqid(time())).".".$extensao[1] ;		
		
			require_once 'connection.php'; 
			$nome = $_POST["nome"];
			$estado = $_POST["estado"];
			$descricao = $_POST["descricao"];
			
			$query = "INSERT INTO cidades (id_estado,nome,descritivo,foto) VALUES ('$estado','$nome','$descricao','$nomearquivo')";
			$insere = mysqli_query($connect,$query);
			$ultimoid = mysqli_insert_id($connect);
			foreach($_POST['tt'] as $tipos_turismo){
				$querytipos = "INSERT INTO cidade_tipo_turismo (id_cidade,id_tipo_turismo) VALUES ($ultimoid,$tipos_turismo)";
				$inserett = mysqli_query($connect,$querytipos);
			}
			
			if ($insere==1 && $inserett==1){
				echo "<script>
							alert('Cidade cadastrada com sucesso');
							location.href='../cidade.php';
					</script>";
			} else {
				echo "<script>
							alert('Deu Ruim');
							history.back();
						</script>";
			}
		}
	}
?>
