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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $peca->getNome()?> - Museu de Racatinga</title>
</head>
<body>
    <?php 
        require_once '../components/navbar.php'; 
        echo var_dump($peca);
    ?>
</body>
</html>