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
            <input required type="checkbox" name="check" value="confirmacao">
            <input name="submit" type="submit" value="DELETE">
        </form>
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