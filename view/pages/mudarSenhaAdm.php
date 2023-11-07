<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        novo usuario : <input type="text" name="user">
        senha : <input type="text" name="senha">
        rg: <input type="text" name="rg" maxlength ='9'>
        cpf: <input type="text" name="cpf" maxlength ='11'>
        <input type="submit" name="submit">
    </form>


    <?php
        include ("../../classes/Conexao.php");
        include ("../../classes/loginAdministrador.php");

        if(isset($_POST['senha'])){
            $user = $_POST['user'];
            $senha = $_POST['senha'];
            $rg = $_POST['rg'];
            $cpf = $_POST['cpf'];
            $classe = new LoginAdministrador();
            $classe->mudarSenha($user, $senha, $rg, $cpf);
            header("location: ./mudarSenhaAdm.php");
        }
    ?>
</body>
</html>