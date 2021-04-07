<?php
	/*print_r($_POST);
	print_r($_FILES);exit;
	*/
	$foto = $_FILES['foto'];
	/*$carlos = explode(".",$foto['name']);
	echo $carlos[1];*/
	
	$foto = $_FILES['foto'];
	//print_r($foto);exit;
	if($foto['error']==4){
		echo "<script>
				alert('Por favor envie uma imagem!');
				history.back();
			 </script>";
	}else if(!preg_match("/(.)+(jpg|JPG|jpeg|JPEG|gif|GIF|png|PNG|svg|SVG|BMP|bmp)/",$foto['name'])){   
		echo "<script>
				alert('Por favor envie uma IMAGEM!');
				history.back();
			 </script>";
	}else{
		$largura = 20000;
		$altura = 10000;
		$tamanho = 2000000;
		
		$dimensoes = getimagesize($foto['tmp_name']);
		//print_r($dimensoes);exit;
		
		if($dimensoes[0]>$largura || $dimensoes[1]>$altura){
			echo "Envie uma imagem menor";
		}else{
			$extensao = explode(".",$foto["name"]);
			$nomearquivo= md5(uniqid(time())).".".$extensao[1] ;
			//echo $nomearquivo;
			$destino = "../imagens/".$nomearquivo;
			$upar = move_uploaded_file($foto["tmp_name"],$destino);		
		
			require_once 'connection.php'; //conexão com o banco de dados
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
			//echo $query;exit;
			
			if($insere==1 && $upar==1 && $inserett==1){
				echo "
						<script>
							alert('Cidade cadastrada com sucesso');
							history.back();
						</script>
						";
			}else{
				echo "<script>
							alert('Deu Ruim');
							history.back();
						</script>";
			}
		}
	}
?>