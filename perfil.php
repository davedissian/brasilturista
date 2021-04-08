<?php
session_start();
require_once './backend/check.php';
require_once './backend/connection.php';
?>
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
    require_once'menu.html';
    ?>

    <main class="container my-5 py-5">
        <h1>Editar Perfil</h1>
        <form method="POST" action="./backend/update.php">
            <div class="card my-4">
                <ul class="list-group list-group-flush">

                    <input type="hidden" class="list-group-item" value="<?php echo $_SESSION['id_usuario'];?>" /> 
                    <input class="list-group-item" id="nome" name="nome" value="<?php echo $_SESSION['nome'];?> " /> 
                    <input class="list-group-item" id="email" name="email" value="<?php echo $_SESSION['email'];?> "/> 
                    <input class="list-group-item" id="cpf" name="cpf" value="<?php echo $_SESSION['cpf'];?> "/> 
                    <input class="list-group-item" id="telefone" name="telefone" value="<?php echo $_SESSION['telefone'];?>"/>
                    <input class="list-group-item" id="sexo" name="sexo" value="<?php echo $_SESSION['sexo'];?>"/>  
                    <input type="password" class="list-group-item" id="senha" name="senha" value="<?php echo $_SESSION['senha'];?>"/>
                    
                    <button class="btn btn-primary p-1 my-1 border-none">Alterar</button>
                    <a href="./backend/delete.php" class="btn btn-primary p-1 my-1 border-none">Deletar</a>
                    <a href="./backend/logout.php" class="btn btn-primary p-1 my-1 border-none">Sair</a>

                </ul>
            </div>
        </form>
    </main>

    <?php
    require_once'footer.html';
    ?>
</body>
</html>