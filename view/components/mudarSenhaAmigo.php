<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./view/css/index.css">
        <title>Museu de Racatinga</title>
    </head>
    <body>
        <div class="amigoMuseu-wrapper">
        <span class="material-symbols-outlined close-icon">close</span>

        <form method="POST" class="account-wrapper login">
                <h1>Mudar senha</h1>
                <div class="userinfo-box">
                    <label for="rg">RG:</label>
                    <input type="text" name="rg">
                

                </div>
                
                <div class="userinfo-box">
                    <label for="cpf">CPF: </label>
                    <input type="text" name="cpf">
                </div>

                </div>
                    <label for="senha">Nova Senha:</label>
                    <input type="text" name="senha">
                <div>

                <button type="submit" name="mudarSenha">Entrar</button>

                <div class="change-wrapper">
                    <p>Não tem uma conta? <a href="./cadastro.php" class="register-button">Registre-se agora!</a></p>
                    <p>Já possui uma conta? <a href="./login.php" class="login-button">Conectar</a></p>
                </div>
            </form>
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