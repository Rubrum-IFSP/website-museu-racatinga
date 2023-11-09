<?php
    require "../../classes/Conexao.php";
    require "../../classes/CreateEventos.php";
    $class = new CreateEventos();
    $class->delete(5);
?>