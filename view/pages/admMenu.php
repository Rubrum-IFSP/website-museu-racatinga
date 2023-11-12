<?php
    session_start();
    if ( $_SESSION["admLogged"]==false ) {
        header("Location: ./loginAdmPagina.php");
    }

    require "../../classes/controller/comentario/ComentarioController.php";
    require "../../classes/controller/usuario/UsuarioController.php";
    $comentario = new ComentarioController();
    $controller = new UsuarioController();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admMenu.css">
    <title>ADM - Museu Racatinga</title>
</head>
<body>
    <?php 
        if ( !$controller->procurarAdm() ) {
            echo "
            <div class='change-pass'>
                <p>Você está usando uma conta provisória, mude de senha para ter acesso total ao sistema</p>
                <a href='./mudarSenhaAdm.php'>Mudar de Senha</a>
            </div>
            ";
        } else {
            require "../components/navBarAdm.php";
        }
    ?>

    <main>
        <h1>Comentários de Amigos do Museu</h1>
        <div class="wrapper-comentario">
            <?php 
                $comentario->mostrarComentarios();
            ?>
        </div>
    </main>
</body>
</html>