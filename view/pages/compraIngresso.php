<?php
    if (session_id() == '') session_start();
    require "../../classes/controller/ingresso/IngressoController.php";

    if(isset($_POST['eventos']) && isset($_POST['check'])){
        $idEvento = $_POST['eventos'];
        $username = $_SESSION['username'];

        $controller = new IngressoController();
            $controller->comprarIngresso($username,$idEvento);
    } else if (!isset($_POST["check"])) {
        $_SESSION["ingressoMessage"] = "Confirme a Compra dos Ingresos";
    }

    header('Location: ./ingressosPagina.php');
?>