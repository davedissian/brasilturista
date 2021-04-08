<?php
    session_start();
    require_once('connection.php');

    $id_usuario = $_SESSION['id_usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $senha = $_POST['senha'];
    
    $query="UPDATE usuario SET nome='$nome', email='$email', cpf='$cpf', telefone='$telefone', sexo='$sexo', senha=sha1('$senha') WHERE id_usuario = $id_usuario";
    $atualizar = mysqli_query($connect, $query);
    if($atualizar){
        session_destroy();
        session_start();
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['sexo'] = $sexo;
        $_SESSION['senha'] = $senha;
        echo "<script>
                alert('Cadastro alterado');
                location.href='../perfil.php';
            </script>";
    } else {
        echo "<script>
                alert('Erro! Cadastro não foi alterado!!');
                location.href='../perfil.php';
            </script>";
    }
