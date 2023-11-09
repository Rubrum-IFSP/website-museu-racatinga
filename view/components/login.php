<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/login.css">
        <title>Museu de Racatinga</title>
    </head>
    <body>
        <header>
            <img src="../images/logo_rubrum.png" alt="logo">
            <nav>
                <a href='../../index.php'>Página Inicial</a>
            </nav>
        </header>
        <div class="container">
            <div class="card">
                <form method="POST" class="card-form">
                        <h1>Bem Vindo de Volta!</h1>
                        <div class="input">
                            <label class='input-label' for="nome">Nome:</label>
                            <input class='input-field' type="text" name="nomeLogin">
                        </div>
                        
                        <div class="input">
                            <label class='input-label' for="">Senha: </label>
                            <input class='input-field' type="text" name="senhaLogin">
                        </div>
                        <div class='action'>
                            <button class='action-button' type="submit" name="submitLogin">Entrar</button>
                        </div>
                        <div class="card-info">
                            <p>Não tem uma conta? <a href="./cadastro.php" class="register-button">Registre-se agora!</a></p>
                            <p>Esqueceu sua senha? <a href="./mudarSenhaAmigo.php" class="mudar-senha-button">Mudar Senha</a></p>
                            <p>Conectar como Administrador ?<a href="../pages/loginAdmPagina.php">Log-in</a> </p>
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

                                $_SESSION['amgLogged'] = true;
                                $_SESSION['admLogged'] = false;
                                $_SESSION['username']=$nome;
                                header("location: ../../index.php");
                            }
                            else
                            {
                                if(isset($_POST['nomeLogin']) && isset($_POST['senhaLogin']))
                                {
                                    echo "<script>alert('Informações Errada(s)')</script>";
                                    unset($_POST['nomeLogin']);
                                    unset($_POST['senhaLogin']);
                                }
                            }
                            

                        }
                        unset($_POST['nomeLogin']);
                        unset($_POST['senhaLogin']);
                    ?>
            </div>
        </div>
        <script src="view/js/amAccountWrapper.js"></script>
    </body>
</html>
