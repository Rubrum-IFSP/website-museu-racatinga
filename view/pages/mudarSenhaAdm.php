<?php
    session_start();
?>
    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crudAdm.css">
    <style>
        body {
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            width: 100%;
            color: white;
            padding: 5px;
            font-size: 1.5em;
            background-color: red;
            margin-top: 0;
        }

        form {
            border-radius: 0;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php 
        echo"<h1>";
        if ( !isset($_SESSION["registroMessage"]) ) {
            echo "É necessário mudar a senha e adicionar suas informações pessoais para continuar";
        } else {
            echo $_SESSION["registroMessage"];
            unset($_SESSION["registroMessage"]);
        }
        echo "</h1>";
    ?>
    <form method="POST" action="logarAdm.php">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="user" id="nome" required>
        </div>

        <div>
            <label for="username">Nome de Usuário:</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </div>

        <div>
            <label for="rg">RG:</label>
            <input type="text" name="rg" maxlength ='9' id="rg" required>
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" maxlength ='11' id="cpf" required>
        </div>
        
        <button type="submit" name="cadastrar">Cadastrar Novo ADM</button>
    </form>
</body>
</html>