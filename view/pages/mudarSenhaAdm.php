<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/crudAdm.css">
    <style>
        h1 {
            color: white;
            margin: 30px;
        }
        button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>É necessário mudar a senha e adicionar suas informações pessoais para continuar</h1>
    <form method="POST">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="user" id="nome" required>
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="text" name="senha" id="senha" required>
        </div>

        <div>
            <label for="rg">RG:</label>
            <input type="text" name="rg" maxlength ='9' id="rg" required>
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" maxlength ='11' id="cpf" required>
        </div>
        
        <button type="submit" name="submit">Cadastrar Novo ADM</button>
    </form>


    <?php
        include ("../../classes/controller/usuario/UsuarioController.php");

        if(isset($_POST['senha'])){
            $usuario = new UsuarioVO(
                "adm",
                $_POST['user'],
                $_POST['cpf'],
                $_POST['senha'],
                $_POST['rg'],
            );

            $controller = new UsuarioController();
            $controller->cadastrar($usuario);

            foreach ($_POST as $key => $value) {
                unset($_POST[$key]);
            }

            header("location: ./admMenu.php");
        }
    ?>
</body>
</html>