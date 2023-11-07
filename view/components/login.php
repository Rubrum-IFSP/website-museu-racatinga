
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
                <h1>Bem Vindo de Volta!</h1>
                <div class="userinfo-box">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nomeLogin">
                </div>
                
                <div class="userinfo-box">
                    <label for="">Senha: </label>
                    <input type="text" name="senhaLogin">
                </div>

                <button type="submit" name="submitLogin">Entrar</button>

                <div class="change-wrapper">
                    <p>Não tem uma conta? <a href="./cadastro.php" class="register-button">Registre-se agora!</a></p>
                    <p>Esqueceu sua senha? <a href="./mudarSenhaAmigo.php" class="mudar-senha-button">Mudar Senha</a></p>
                </div>
            </form>
            <?php
                if(isset($_POST['senhaLogin']) && isset($_POST['nomeLogin'])){
                    $nome = $_POST['nomeLogin'];
                    $senha = $_POST['senhaLogin'];
                    require "../../classes/Conexao.php";
                    require "../../classes/AmigoDoMuseu.php";
                    $classe = new AmigoDoMuseu();

                    $logado = $classe->logar($nome,$senha);
                    if($logado)
                    {
                        session_start();
                        $_SESSION['amgLogged'] = true;
                        header("location: ../../index.php");
                    }
                    else
                    {
                        if(isset($_POST['nomeLogin']) && isset($_POST['senhaLogin']))
                        {
                            echo "<script>alert('Login deu errado hein')</script>";
                            unset($_POST['nomeLogin']);
                            unset($_POST['senhaLogin']);
                        }
                    }
                    unset($_POST['nomeLogin']);
                    unset($_POST['senhaLogin']);

                }
            ?>

        <script src="view/js/amAccountWrapper.js"></script>
    </body>
</html>