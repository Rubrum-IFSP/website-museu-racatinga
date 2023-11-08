<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <title>Museu de Racatinga</title>
    </head>
    <body>
        <div class="container">
            <div class="card">

        <form method="POST" class="card-form">
        <h1>Mudar senha</h1>
                <div class="input">
                    <label class='input-label'for="rg">RG:</label>
                    <input  class='input-field' type="text" name="rg">
                </div>
                
                <div class="input">
                    <label class='input-label' for="cpf">CPF: </label>
                    <input class='input-field' type="text" name="cpf">
                </div>

                </div class="input">
                    <label class='input-label' for="senha">Nova Senha:</label>
                    <input class='input-field' type="text" name="senha">
                <div>
                <div class='action'>
                    <button class='action-button' type="submit" name="mudarSenha">Entrar</button>
                </div>
                <div class="card-info">
                    <p>Não tem uma conta? <a href="./cadastro.php" class="register-button">Registre-se agora!</a></p>
                    <p>Já possui uma conta? <a href="./login.php" class="login-button">Conectar</a></p>
                </div>
            </form>
            </div>
        </div>
            <?php
                if(isset($_POST['rg']) && isset($_POST['cpf']))
                {
                    require"../../classes/Conexao.php";
                    require"../../classes/AmigoDoMuseu.php";
                    $class = new AmigoDoMuseu();
                    $cpf = $_POST['cpf'];
                    $rg = $_POST['rg'];
                    $senha = $_POST['senha'];
                    
                    if($class->mudarSenha($cpf,$rg,$senha))
                    {
                        header("location: ./login.php");
                    }
                    else
                    {

                    }

                }
            ?>

        <script src="view/js/amAccountWrapper.js"></script>
            
    </body>
</html>