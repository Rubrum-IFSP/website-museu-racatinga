<?php 
    require "../../model/php/Conexao.php";
    require "../../model/php/Acervo.php";
    
    $acervo = new Acervo();
    $maxPaginas = $acervo->getMaxPaginas();

    if ( isset($_GET["pagina"]) && ($_GET["pagina"] > $maxPaginas || $_GET["pagina"] < 0) ){
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
            <a href="../../index.html">Home</a>
            <a href="#">Login</a>
        </nav>
    </header>

    <div class="navegacao-acervo">
        <?php
            echo "Página: <div>", $_GET["pagina"] + 1, " de ", $maxPaginas, "</div>"; 
        ?>

        <div>
            <a href="./acervo.php?pagina=<?php 
                if ( isset( $_GET["pagina"] ) ) {
                    if ( $_GET["pagina"] <= 0 ) { 
                        echo $maxPaginas - 1; 
                    } else {
                        echo $_GET["pagina"] - 1;
                    }
                }
            ?>">⬅️</a>

            <a href="./acervo.php?pagina=<?php 
                if ( isset( $_GET["pagina"] ) ) {
                    if ( $_GET["pagina"] <= $maxPaginas ) {
                        echo $_GET["pagina"];
                    } else  {
                        echo $_GET["pagina"] + 1;
                    }
                }
            ?>">➡️</a>
                
        </div>
    </div>

    <div class="wrapper-peca">
        <?php 
            $acervo->listar();
        ?>
    </div>
</body>
</html>