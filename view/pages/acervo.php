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

    <a href="./acervo.php?pagina=<?php echo ( isset( $_GET["pagina"] ) ) ? $_GET["pagina"] + 1 : 1 ; ?>">Próxima paginas</a>
    <a href="./acervo.php?pagina=<?php echo ( isset( $_GET["pagina"] ) ) ? $_GET["pagina"] - 1 : 1 ; ?>">Página anterior</a>

    <?php 

        require "../../model/php/Conexao.php";
        require "../../model/php/Acervo.php";
        
        $acervo = new Acervo();
        $acervo->listar();

    ?>

</body>
</html>