<?php
 session_start();
 if ( $_SESSION["admLogged"]==false ) {
     header("Location: ./loginAdmPagina.php");
 }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/crudAdm.css">
        <title>Museu Racatinga - Adicionar Peça</title>
    </head>

    <body>
        <?php 
            require '../components/navbarAdm.php';
        ?>

        <main>
            <h1>Adicionar Evento</h1>
            <form method="POST" >  
                <div>
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" maxlength="100" required>    
                </div>

                <div>
                    <label for="ano">Data: </label> 
                    <input type="date" name="data" id="ano" required>
                </div>

                <div>
                    <label for="desc">Descrição: </label>
                    <textarea type="text" name="desc" id="desc" maxlength="300" required></textarea>                  
                </div>

                <button type="submit" name="submit">Enviar</button> 
            </form>
        </main>
    </body>
</html>
<?php
    if(isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['desc'])){
        require "../../classes/controller/evento/EventoController.php";

        $controller = new EventoController();

        $evento = new EventoVO(
            $_POST['nome'],
            $_POST['desc'],
            $_POST['data']
        );

        if(!$controller->adicionarEvento($evento)) {
            echo "<script>alert('Já existe um Evento com este nome')</script>";
        }
    }
?>