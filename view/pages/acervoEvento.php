<?php
    require "../../classes/controller/evento/EventoController.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventos.css">
    <link rel="shortcut icon" href="../images/logo_rubrum.png" type="image/x-icon">
    <title>Eventos - Museu de Racatinga</title>
</head>
<body>
    <?php require "../components/navbar.php"; ?>

    <main>
        <h1>Eventos do Museu Paulo Agostinho</h1>
        <?php
            if ( isset($_SESSION["admLogged"]) || isset($_SESSION["amgLogged"]) ) echo "<p class='evento-title'><a href='./ingressosPagina.php'>Comprar Ingresso</a></p>";
            else echo "<p class='evento-title ingresso-link'>Entre com uma conta para comprar seu ingresso</p>";
        ?>
        <div class="evento-wrapper">
            <?php
                $controller = new EventoController();
                $controller->listarEventos();
            ?>
        </div>
    </main>
</body>
</html>


    
