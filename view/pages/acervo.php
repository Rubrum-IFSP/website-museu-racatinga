<?php 
    session_start();
    require "../../classes/Conexao.php";
    require "../../classes/Acervo.php";
    
    $acervo = new Acervo();
    $maxPaginas = $acervo->getMaxPaginas();

    if ( isset($_GET["pagina"]) && ($_GET["pagina"] > $maxPaginas-1 || $_GET["pagina"] < 0) ){
        header("Location: ./acervo.php?pagina=0");
        $_GET["pagina"] = 0;
    } else if ( !isset($_GET["pagina"]) ) {
        $_GET["pagina"] = 0;
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
    <header>
        <img src="../images/logo_rubrum.png" alt="logo">
        <nav>
            <a href="../../index.php">Home</a>
            <?php
                if ( isset($_SESSION['admLogged']) && $_SESSION['admLogged']==true ) {
                    echo "<a href='./admMenu.php'>Menu do Administrador</a>";
                } else if (!$logged) {
                    echo "<a class='open-login-button'>Login</a>";
                } 
            ?>
        </nav>
    </header>

    <div class="navegacao-acervo">
        <?php
            echo "<h1>Página</h1> <div><p>", $_GET["pagina"] + 1, " de ", $maxPaginas, "</p></div>"; 
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