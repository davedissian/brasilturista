<?php
require_once'connection.php';
if (isset($_POST["email"]) && isset($_POST["senha"])){
    $email = $_POST["email"];
    $senha = sha1($_POST["senha"]);

    $query = "SELECT id_usuario, email, senha, tipo_usuario FROM usuario WHERE email='$email' AND senha='$senha'";
    $executar = mysqli_query($connect, $query);
    $encontrar = mysqli_num_rows($executar);
    if($encontrar == 1){
        $login = mysqli_fetch_array($executar);
        session_start();
        $_SESSION['id_usuario'] = $_POST['id_usuario'];
        $_SESSION['tipo_usuario'] = $_POST['tipo_usuario'];
        header('Location: ./perfil.php');
    } else {
        echo "Dados incorretos!!";
    }
}
