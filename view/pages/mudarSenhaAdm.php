<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        senha : <input type="text" name="senha">
        <input type="submit" name="submit">
    </form>


    <?php
        include ("../../classes/Conexao.php");
        include ("../../classes/loginAdministrador.php");

        if(isset($_POST['senha'])){
            $senha = $_POST['senha'];
            $classe = new LoginAdministrador();
            $classe->mudarSenha($senha);
        }
    ?>
</body>
</html>