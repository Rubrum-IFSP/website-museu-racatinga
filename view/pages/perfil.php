<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <title>Museu Racatinga - Perfil</title>
</head>
<body>
    <header>
        <nav>
            <a href="../../index.php">Página Inicial</a>
            <a href="./acervo.php">Acervo</a>
            <a href='./deslogar.php' class='open-login-button'>Deslogar</a>
            <a href='./acervoEvento.php' class='open-login-button'>Eventos</a>
 
        
        </nav>
    </header>
    <main>
        <?php
            require "../../classes/Conexao.php";
            require "../../classes/AmigoDoMuseu.php";
            require "../../classes/CreateIngressos.php";

            $classPerfil = new AmigoDoMuseu();

            $classPerfil->mostrarDados($_SESSION['username']);
            $classIngresso = new CreateIngressos();

            $classIngresso->mostrarIngressos($_SESSION['username']);

        ?>


    </main>
</body>

</html>