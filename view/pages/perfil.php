<?php
    session_start();
    require_once "../../classes/controller/usuario/UsuarioController.php";
    require_once "../../classes/controller/ingresso/IngressoController.php";
    
    $usuarioController = new UsuarioController();
    
    try {
        $ownProfile = true; 
        if ( !isset($_SESSION["username"]) && !isset($_SESSION["userpass"]) ) {
            throw new Exception("Usuario Deslogado");
        }

        if (isset($_GET['user']) && $_GET['user'] == 'self' ) { 
            $username = $_SESSION["username"];
            $ownProfile = true;
        } else if (isset($_GET['user'])) {
            $username = $_GET['user'];
            $ownProfile = false;
        }
        
        $usuario = $usuarioController->getUsuario( $username );
    } catch (Exception $e) {
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <title><?php echo $username?> - Museu Racatinga</title>
</head>
<body>
        <?php
           require_once "../components/navbar.php";
        ?>
        
        <h1><?php echo $username?></h1>

        <?php 
            if ( $ownProfile || $_SESSION["admLogged"] ) {
                echo "<button>Informações Pessoais</button>";
            }
        ?>
</body>

</html>