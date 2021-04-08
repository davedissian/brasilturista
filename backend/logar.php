<?php
session_start();
require_once 'connection.php';

if(empty($_POST['email']) || empty($_POST['senha'])){
    header('Location: ../login.php');
    exit();
  }
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $senha = mysqli_real_escape_string($connect, $_POST['senha']);

    $query = "SELECT * FROM usuario WHERE email='{$email}' AND senha=sha1('{$senha}')";
    $executar = mysqli_query($connect, $query);
    $encontrar = mysqli_num_rows($executar);
    if($encontrar == 1){
        while ($row = mysqli_fetch_assoc($executar)) {
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nome'] = $row['nome_usuario'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['cpf'] = $row['cpf'];
            $_SESSION['telefone'] = $row['telefone'];
            $_SESSION['sexo'] = $row['sexo'];
            $_SESSION['senha'] = $row['senha'];
        }
        header('Location: ../perfil.php');
    } else {
        $_SESSION['naologado'] = true;
        echo"<script>alert('Login inválido!'); location.href='../login.php'</script>";    
    exit();
    }

      
 