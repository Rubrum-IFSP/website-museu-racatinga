<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        usuario : <input type="text" name="usuario">
        senha : <input type="password" name="senha">
        <input type="submit" name="submit">
    </form>

    <?php
        include("../../classes/Conexao.php");
        include("../../classes/AdmMenu.php");
        include("../../classes/LoginAdministrador.php");
        
        session_start();

        if(isset($_POST["usuario"])) {
            $AdmMenu = new AdmMenu();
            $validLogin = false;

            if ( $AdmMenu->procurarAdm() ) {
                $user = $_POST["usuario"];
                $pass =$_POST['senha'];
                
                $classeLogin = new LoginAdministrador();
                if( $classeLogin->logarAdm($user,$pass) ) {
                    $validLogin = true;
                } else {
                    $validLogin = false;
                }
            } else {
                if($_POST['usuario']=='administrador' && $_POST['senha']=='123456'){
                    $validLogin = true;
                } else { 
                    $validLogin = false;
                }
            }
            
            if ($validLogin){
                $_SESSION["admLogged"] = true;
                echo "<p><spam class='warning'>Informação errada</spam></p>";
                header("Location: ./admMenu.php");
            } 
            else {
                echo "<p><spam class='warning'>Informação errada</spam></p>";
            }
        }
    ?>
</body>
</html>