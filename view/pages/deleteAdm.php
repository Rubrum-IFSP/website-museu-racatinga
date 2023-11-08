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
        <title>Museu Racatinga - Remover Peça</title>
    </head>

    <body>
        <header>
            <nav>
                <a href="./admMenu.php">Voltar ao Menu</a>
                <a href="./createAdm.php">Adicionar Peça</a>
                <a href="./updateAdm.php">Editar Peça</a>
                <a href="./acervo.php">Olhar Acervo</a>
            </nav>
        </header>

        <main>
            <h1>DELETE</h1>
            <form method="POST">
                <select name="pecas">
                    <option name="placeHolder" value="Escolha...">Escolha...</option>
                    <?php
                        $mysqli = mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
                        $query = "SELECT nome FROM Pecas";
                        $result = mysqli_query($mysqli, $query);
                        
                        if(mysqli_num_rows($result)> 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                                $selectedProduct = $row['nome'];
                                echo "<option name='$selectedProduct' value='$selectedProduct'>$selectedProduct</option>";
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
        if($_POST['pecas']!="Escolha..."){
            $peca = $_POST['pecas'];
            require "../../classes/Conexao.php";
            require "../../classes/Create.php";
            $class = new Create();

            $class->delete($peca);
            header("location: ./deleteAdm.php");
        }
        else echo "<p> Escolha uma peça válida </p>";
        }
    

?>