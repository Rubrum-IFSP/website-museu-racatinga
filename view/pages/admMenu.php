<?php 
    session_start();
    if ( !isset($_SESSION["admLogged"]) ) {
        header("Location: ./loginAdmPagina.php");
    }

    require "../../classes/Conexao.php";
    require "../../classes/AdmMenu.php";
    require "../../classes/Comentario.php";
    $admMenu = new admMenu();
    $comentario = new Comentario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admMenu.css">
    <title>ADM - Museu Racatinga</title>
</head>
<body>
    <header>
        <nav>
            <a href="./createAdm.php">Adicionar Peça</a>
            <a href="./deleteAdm.php">Deletar Peça</a>
            <a href="./updateAdm.php">Editar Peça</a>
            <a href="./acervo.php">Olhar Acervo</a>
        </nav>
    </header>
    
    <?php 
        if ( !$admMenu->procurarAdm() ) {
            echo "
            <div class='change-pass'>
                <p>Você está usando uma onta provisória, mude de senha para ter acesso total ao sistema</p>
                <a href='./mudarSenhaAdm.php'>Mudar de Senha</a>
            </div>
            ";
        }
    ?>

    <main>
        <h1>Comentários de Amigos do Museu</h1>
        <div class="wrapper-comentario">
            <?php 
                $comentario->mostrarComentarios();
            ?>
        </div>
    </main>
</body>
</html>