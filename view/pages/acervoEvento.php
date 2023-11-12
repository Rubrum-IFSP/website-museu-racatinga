<?php
    require "../../classes/controller/evento/EventoController.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventos.css">
    <title>Eventos - Museu de Racatinga</title>
</head>
<body>
    <?php require "../components/navbar.php"; ?>

    <main>
        <h1>Eventos do Museu Paulo Agostinho</h1>
        <div class="evento-wrapper">
            <?php
                $controller = new EventoController();
                $controller->listarEventos();
            ?>
        </div>
    </main>
</body>
</html>


    
