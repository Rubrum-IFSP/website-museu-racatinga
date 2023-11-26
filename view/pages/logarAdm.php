<?php
    session_start();
    include("../../classes/controller/usuario/UsuarioController.php");
    $controller = new UsuarioController();

    if (isset($_POST["login"])) {
        if ( $controller->procurarAdm() ) {
            $user = $_POST["usuario"];
            $pass = $_POST['senha'];

            if ( $controller->entrar($user, $pass) ) {
                header("Location: admMenu.php");
                return true;
            }
        } else {
            if ($_POST['usuario'] == 'administrador' && $_POST['senha'] == '123456') {
                header("Location: mudarSenhaAdm.php");
                return true;
            }
        }
        
        header("Location: loginAdmPagina.php");
        $_SESSION['failedLogin'] = true;
        return false;
    } else if ( isset($_POST['cadastrar']) ) {
        $usuario = new UsuarioVO(
            "adm",
            $_POST['user'],
            $_POST['cpf'],
            $_POST['senha'],
            $_POST['rg'],
            $_POST['username']
        );

        if ($controller->cadastrar($usuario)) {
            header("location: ./admMenu.php");
        } else {
            header("location: ./mudarSenhaAdm.php");
        }

    }
?>