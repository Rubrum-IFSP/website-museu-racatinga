<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        usuario : <input type="text" name="usuario">
        senha : <input type="text" name="senha">
        <input type="submit" name="submit">
    </form>
    <a href="./MudarSenha.php">Mudar Senha</a>

    <?php
        include("../../classes/Conexao.php");
        include("../../classes/LoginAdministrador.php");
        
        if(isset($_POST["usuario"])){
            $user = $_POST["usuario"];
            $pass =$_POST['senha'];
            
            $classeLogin = new LoginAdministrador();
            if( $classeLogin->logarAdm($user,$pass)) echo "deu certo";
            else echo "deu errado";
        }
    ?>
</body>
</html>