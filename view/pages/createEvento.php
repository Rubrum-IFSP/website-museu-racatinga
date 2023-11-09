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
        <header>
            <nav>
                <a href="./admMenu.php">Voltar ao Menu</a>
                <a href="./deleteEvento.php">Deletar Evento</a>
                <a href="./updateEvento.php">Editar Evento</a>
                <a href="./acervo.php">Olhar Acervo</a>
            </nav>
        </header>

        <main>
            <h1>Adicionar Evento</h1>
            <form method="POST" >  
                <div>
                    <label for="descricao">Nome: </label>
                    <input type="text" name="nome" id="descricao" required>    
                </div>

                <div>
                    <label for="ano">Data: </label> 
                    <input type="date" name="data" id="ano" required>
                </div>

                <div>
                    <label for="Descrição">Descrição: </label>
                    <input type="text" name="desc" id="artista" required>                    
                </div>

                <button type="submit" name="submit">Enviar</button> 
            </form>
        </main>
    </body>
</html>
<?php
    if(isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['desc'])){
        require "../../classes/Conexao.php";
        require "../../classes/createEventos.php";

        $class= new CreateEventos();

        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $desc = $_POST['desc'];

        $verify= $class->create($nome,$data,$desc);
        if(!$verify){
            echo "<script>alert('Já existe um Evento com este nome')</script>";
        }
    }
?>