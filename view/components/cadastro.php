<?php
    session_start();
?>
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
                <form method ="POST">
                    <h1>Bem Vindo ao Museu!</h1>
                        <div class="input>
                            <label class="input-label">Nome:</label>
                            <input class='input-field' required type="text" name="nome">
                        </div>
                        
                        <div class="input>
                            <label class="input-label">Senha: </label>
                            <input class='input-field' required type="text" name="senha">
                        </div>


                        <div class="input>
                            <label class="input-label" >CPF: </label>
                            <input class='input-field' required type="text" name="cpf" maxlength ='11'>
                        </div>

                        <div class="input>
                            <label class="input-label">RG: </label>
                            <input class='input-field' required type="text" name="rg" maxlength='9'>
                        </div>
                        <div class='action'>
                            <button class='action-button' type="submit" name="submit">Registrar</button>
                        </div>
                    <div class="card-info">
                        <p>Já tem uma conta? <a href="./login.php" class="login-button">Entre agora!</a></p>
                        <p>Esqueceu sua senha? <a href="./mudarSenhaAmigo.php" class="mudar-senha-button">Mudar Senha</a></p>
                    </div>
                </form>
            <?php
                if ( isset($_POST['nome']) && isset($_POST['senha'])){
                    if(isset($_POST['rg']) && $_POST['cpf'])
                    {
                        require("../../classes/Conexao.php");
                        require("../../classes/AmigoDoMuseu.php");
                        
                        $nome = $_POST['nome'];
                        $senha = $_POST['senha'];
                        $cpf = $_POST['cpf'];
                        $rg = $_POST['rg'];

                        $AmigoDoMuseu = new AmigoDoMuseu();
                        $cadastrado = $AmigoDoMuseu->cadastrar($nome, $senha, $cpf, $rg);

                        if($cadastrado)
                        {

                            $_SESSION['amgLogged'] = true;
                            $_SESSION['admLogged'] =false;
                            $_SESSION['username']=$nome;
                            header("location: ../../index.php");
                        }
                        else
                        {
                            if ( isset($_POST['nome']) && isset($_POST['senha'])){
                                if(isset($_POST['rg']) && $_POST['cpf']){
                                    echo '<script>alert("nn deu certo o cadastro")</script>';
                                    unset($_POST['nome']);
                                    unset($_POST['senha']);
                                    unset($_POST['cpf']);
                                    unset($_POST['rg']);
                                }
                            }
                        }

                        unset($_POST['nome']);
                        unset($_POST['senha']);
                        unset($_POST['cpf']);
                        unset($_POST['rg']);
                    }
                }
            ?>
            </div>
        </div>  
    </body>
</html>