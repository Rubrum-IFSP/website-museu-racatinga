<?php
    session_start();
    require_once "../../classes/controller/usuario/UsuarioController.php";
    require_once "../../classes/controller/ingresso/IngressoController.php";
    
    $usuarioController = new UsuarioController();
    $ingressoController = new IngressoController();
    
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
    <link rel="shortcut icon" href="../images/logo_rubrum.png" type="image/x-icon">
    <title><?php echo $username?> - Museu Racatinga</title>
</head>
<body>
    <?php
        require_once "../components/navbar.php";
    ?>
    
    <main>
        <div>
            <h1><?php echo $usuario->getNome() ?></h1>
            <h2><?php echo $username ?></h2>
        </div>

        <?php 
            if ( $ownProfile || $_SESSION["admLogged"] ) {
                echo "<h2>Ingressos: </h2>";
                $ingressoController->mostrarIngressos($username);
            }
        ?>
    </main>
</body>

</html>