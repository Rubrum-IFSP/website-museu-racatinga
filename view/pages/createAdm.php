<?php
    require "../../classes/Conexao.php";
    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST">
            <select name="eventos" id="eventos">
            <?php
                $Conn = new Conexao();
                $mysqli = $Conn->conectar();
                $query = "SELECT nome FROM Evento";
                $result = mysqli_query($mysqli, $query);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0 ){
                    while($row = mysqli_fetch_assoc($result)){
                        $selectedProduct = $row['nome'];
                        echo "<option name='$selectedProduct' value='.$selectedProduct.'>".$selectedProduct."</option>";
                    }
            
            ?>
            </select>
            
            codigo <input type="text" name="codigo"><br>
            data expiração <input type="date" name="dateExp">

            <input type="submit" name="submit" value="Submit">     
        </form>
    </body>
</html>

