<?php
    require_once "../../classes/controller/acervo/AcervoController.php";
    $controller = new AcervoController();
    $peca = $controller->getPeca($_GET["peca"]);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/peca.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_rubrum.png" type="image/x-icon">
    <title><?php echo $peca->getNome()?> - Museu de Racatinga</title>
</head>
<body>
    <?php 
        require_once '../components/navbar.php';
    ?>

    <div class="peca-wrapper">
        <figure>
            <img src="../imgAcervo/<?php echo $peca->getFoto() ?>" alt="">
        </figure>

        <div class="informacoes-peca">
            <div class="informacoes-top">
                <?php 
                    echo "<h2>".$peca->getNome()."</h2>";
                    echo "<h3>".$peca->getArtista()."</h3>";
                    echo "<h4>".$peca->getAno()."</h4>";
                ?>
            </div>

            <div class="informacoes-bottom">
                <?php echo "<h3>Evento: ".$peca->getEvento()."</h3>" ?>
                <?php echo "<p>".$peca->getDescricao()."</p>" ?>
            </div>
        </div>
    </div>
</body>
</html>