<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require($root."/prototipo-museu-racatinga/classes/controller/usuario/UsuarioController.php");
    if (session_id() == "") session_start();

    $usuarioController = new UsuarioController();

    if ( isset($_POST["cadastrar"]) ) {
        $usuario = new UsuarioVO(
            "amg",
            $_POST['nomeRegistro'],
            $_POST['cpfRegistro'],
            $_POST['senhaRegistro'],
            $_POST['rgRegistro']
        );

        $usuarioController->cadastrar($usuario);
    } else if ( isset($_POST["login"]) ) {
        $nome = $_POST['nomeLogin'];
        $senha = $_POST['senhaLogin'];
 
        $usuarioController->entrar($nome, $senha);
    }

    foreach ($_POST as $key => $value) {
        unset($_POST[$key]);
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
?>