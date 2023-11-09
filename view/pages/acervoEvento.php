
<?php
session_start();
require("../../classes/Conexao.php");
require("../../classes/CreateEventos.php");

$class = new CreateEventos();
$class->mostrar();

?>
    
