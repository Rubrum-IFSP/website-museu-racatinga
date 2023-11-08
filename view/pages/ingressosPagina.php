<?php
    require "../../classes/Conexao.php";
    require "../../classes/createIngressos.php";
    session_start();
    // aq é a compra do ingresso, vc vai ter um form,***************** APENAS AMIGOS DO MUSEU PODEM ENTRAR NA PÁGINA INGRESSOS****************************
    // 1 input = <select> com o nome dos eventos * <option value='evento1' name='$id'>
    // 2 input check box "CERTEZA QUE QUER COMPRAR?"
    // 3 input  BUTTON COMPRAR INGRESSO
?>