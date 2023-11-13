<?php
    session_start();
    if ( $_SESSION["admLogged"]==false ) {
  
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
                    <label for="nome">Nome: </label> 
                    <input type="text" name ="nome" id="nome" maxlength="100" required >
                </div>

                <div>
                    <label for="artista">Artista: </label>
                    <input type="text" name="artista" id="artista" required>                    
                </div>
                
                <div>
                    <label for="ano">Ano: </label> 
                    <input type="date" name="ano" id="ano" required>
                </div>

                <div>
                    <label for="descricao">Descrição: </label>
                    <textarea type="text" name="desc" id="descricao" maxlength="300" required> </textarea>
                </div>
                <div>
                    <label for="imagem">Imagem: </label>
                    <input type="file" name="imagem" id ="imagem" required>
                </div>

                <button type="submit" name="submit">Enviar</button> 
            </form>
        </main>
    </body>
</html>
<?php
    if(isset($_POST['desc']) && isset($_POST['ano'])){
        if(isset($_POST['artista']) && isset($_POST['nome'])){
            require ("../../classes/controller/acervo/AcervoController.php");
            $controller = new AcervoController();
            


            $peca = new PecaVO(
                $_POST['nome'],
                $_POST['desc'],
                $_POST['ano'],
                $_POST['artista'],
                $_POST['imagem']
                
            );
            
            $controller->adicionarPeca($_POST["eventos"], $peca);

            foreach ($_POST as $key => $value) {
                unset($_POST[$key]);
            }
        }
    }
?>
