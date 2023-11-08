<?php
 session_start();
 if ( !isset($_SESSION["admLogged"]) ) {
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
                <a href="./deleteAdm.php">Deletar Peça</a>
                <a href="./updateAdm.php">Editar Peça</a>
                <a href="./acervo.php">Olhar Acervo</a>
            </nav>
        </header>

        <main>
            <h1>Adicionar Peça</h1>
            <form method="POST" >
                <div>
                    <label for="eventos">Evento da Peça: </label>
                    <select name="eventos" id="eventos">
                        <?php
                            $mysqli = mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
                            $query = "SELECT nome FROM Evento";
                            $result = mysqli_query($mysqli, $query);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0 ){
                                while($row = mysqli_fetch_assoc($result)){
                                    $selectedProduct = $row['nome'];
                                    echo "<option name='$selectedProduct' value='$selectedProduct'>$selectedProduct</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                
                <div>
                    <label for="descricao">Descrição: </label>
                    <input type="text" name="desc" id="descricao" required>    
                </div>

                <div>
                    <label for="ano">Ano: </label> 
                    <input type="text" name="ano" id="ano" required>
                </div>

                <div>
                    <label for="artista">Artista: </label>
                    <input type="text" name="artista" id="artista" required>                    
                </div>

                <div>
                    <label for="nome">Nome: </label> 
                    <input type="text" name ="nome" id="nome" required >
                </div>

                <button type="submit" name="submit">Enviar</button> 
            </form>
        </main>
    </body>
</html>
<?php
    if(isset($_POST['desc']) && isset($_POST['ano'])){
        if(isset($_POST['artista']) && isset($_POST['nome'])){
            require "../../classes/Conexao.php";
            require "../../classes/Create.php";
            $class = new Create();
            
            $evento = $_POST['eventos'];
            $desc = $_POST['desc'];
            $ano = $_POST['ano'];
            $artista = $_POST['artista'];
            $nome = $_POST['nome'];
            
            $class->createFunction($evento, $desc, $ano, $artista, $nome);
            unset($_POST['desc']);
            unset($_POST['ano']);
            unset($_POST['artista']);
            unset($_POST['nome']);
        }
    }
?>