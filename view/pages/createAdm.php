<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Create</h1>
        <form method="POST" >
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
            </select><br>
            
            descricao <input type="text" name="desc" required><br>
            ano <input type="text" name="ano" required><br>
            artista <input type="text" name="artista" required><br>
            nome <input type="text" name ="nome"required ><br>

            <input type="submit" name="submit" value="Submit">     
        </form>
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
            $class->create($evento, $desc, $ano, $artista, $nome);
            header("location: ./createAdm.php");
        }
    }
?>