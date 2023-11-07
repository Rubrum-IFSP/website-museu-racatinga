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
        
    </head>
    <body>
        <h1>UPDATE</h1>
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
            descricao <input type="text" name="desc" required><br>
            ano <input type="text" name="ano" required><br>
            artista <input type="text" name="artista" required><br>
            nome <input type="text" name ="nome"required ><br>

            <input type="submit" value="UPDATE">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['desc']) && isset($_POST['ano'])){
        if(isset($_POST['artista']) && isset($_POST['nome'])){
            if($_POST['pecas']!="Escolha..."){
                require "../../classes/Conexao.php";
                require "../../classes/Create.php";
                $class = new Create();
                $peca = $_POST['pecas'];
                $desc = $_POST['desc'];
                $ano = $_POST['ano'];
                $artista = $_POST['artista'];
                $nome = $_POST['nome'];
                $class->update($peca, $desc, $ano, $artista, $nome);
                header("location: ./updateAdm.php");
            }
            else{
                echo "<p> Escolha uma peça valida</p>";
            }
        }
    }
?>