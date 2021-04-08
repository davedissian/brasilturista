<?php
session_start();
if(!$_SESSION['email']){
    echo "<script>
            alert('Por favor faça o login!');
            location.href='/brasilturista/login.php'
        </script>";
    exit();
}