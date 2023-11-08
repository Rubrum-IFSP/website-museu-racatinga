<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>É necessário mudar a senha e adicionar suas informações pessoais para continuar</h1>
    <form method="POST">
        novo usuario : <input type="text" name="user">
        senha : <input type="text" name="senha">
        rg: <input type="text" name="rg" maxlength ='9'>
        cpf: <input type="text" name="cpf" maxlength ='11'>
        <input value="Cadastrar Novo ADM" type="submit" name="submit">
    </form>


    <?php
        include ("../../classes/Conexao.php");
        include ("../../classes/AdmMenu.php");

        if(isset($_POST['senha'])){
            $user = $_POST['user'];
            $senha = $_POST['senha'];
            $rg = $_POST['rg'];
            $cpf = $_POST['cpf'];
            $classe = new AdmMenu();
            $classe->mudarSenha($user, $senha, $rg, $cpf);
            unset($_POST['user']);
            unset($_POST['senha']);
            unset($_POST['rg']);
            unset($_POST['cpf']);

            $_SESSION['admLogged'] = true;
            $_SESSION['amgLogged'] = false;
            $_SESSION['username']=$user;
            header("location: ./admMenu.php");

            
        }
    ?>
</body>
</html>