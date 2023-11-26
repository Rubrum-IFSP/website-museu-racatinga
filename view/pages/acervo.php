<?php 
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    require "$root/prototipo-museu-racatinga/classes/controller/acervo/AcervoController.php";
    
    $acervo = new AcervoController();
    $maxPaginas = $acervo->getMaxPaginas();

    if ( isset($_GET["pagina"]) && ($_GET["pagina"] > $maxPaginas-1 || $_GET["pagina"] < 0) ){
        header("Location: ./acervo.php?pagina=0");
        $_GET["pagina"] = 0;
    } else if ( !isset($_GET["pagina"]) ) {
        $_GET["pagina"] = 0;
    }

    if(isset($_SESSION['amgLogged']) || isset($_SESSION['admLogged'])){
        $logged = true;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/acervo.css">
    <title>Museu de Racatinga - Acervo</title>
</head>
<body>
    <?php
        require "$root/prototipo-museu-racatinga/view/components/navbar.php";
    ?>

    <div class="navegacao-acervo">
        <?php
            echo "<h1>Acervo Museu Paulo Agostinho Sobrinho</h1> <div><p>", $_GET["pagina"] + 1, " de ", $maxPaginas, "</p></div>"; 
            include "../components/barraNavegacaoAcervo.php";
        ?>
    </div>


    <div class="wrapper-peca">
        <?php 
            $acervo->listar();
        ?>
    </div>

    <div class="navegacao-acervo">
        <?php
            include "../components/barraNavegacaoAcervo.php";
        ?>
    </div>
</body>
</html>