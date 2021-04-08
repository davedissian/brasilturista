<?php
	function ChecaEmail($email, $connect){
		$checagem = "SELECT email FROM usuario WHERE email = '$email'";
		$executa = mysqli_query($connect,$checagem);
		$acheiemail = mysqli_num_rows($executa);
		
		if($acheiemail==1){
			return true;
		}else{
			return false;
		}
	}
?>
