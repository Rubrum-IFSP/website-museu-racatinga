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
        <title>Museu Racatinga - Remover Evento</title>
    </head>

    <body>
        <header>
            <nav>
                <a href="./admMenu.php">Voltar ao Menu</a>
                <a href="./createEvento.php">Adicionar Evento</a>
                <a href="./updateEvento.php">Editar Evento</a>
                <a href="./acervo.php">Olhar Acervo</a>
            </nav>
        </header>

        <main>
            <h1>DELETE</h1>
            <form method="POST">
                <select name="eventos">
                    <option name="placeHolder" value="Escolha...">Escolha...</option>
                    <?php
                        $mysqli = mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
                        $query = "SELECT nome, id FROM Evento";
                        $result = mysqli_query($mysqli, $query);
                        
                        if(mysqli_num_rows($result)> 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                                $selectedProduct = $row['nome'];
                                $id = $row['id'];
                                echo "<option name='$id' value='$id'>$selectedProduct</option>";
                            }
                        }
                    ?>
                </select>

                <div class="confirm-container">
                    <label for="confirmar" class="confirm-label">Confirmar Ação?</label>
                    <input required type="checkbox" name="check" id="confirmar" value="confirmacao">
                </div>

                <button name="submit" type="submit">DELETAR</button>
            </form>
        </main>
    </body>
</html>
<?php
    if(isset($_POST['submit']) && isset($_POST['check'])){
        if($_POST['eventos']!="Escolha..."){
            $evento = $_POST['eventos'];
            require "../../classes/Conexao.php";
            require "../../classes/CreateEventos.php";
            $class = new CreateEventos();

            $class->delete($evento);
            header("location: ./deleteEvento.php");
        }
        else echo "<script>alert('Escolha um Evento Válido!')</script>";
        }
    

?>