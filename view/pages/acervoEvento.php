<form method='post'>
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
                    <input type="checkbox" name="check">
<button type="submit" name="submitDeletar" >deletar</button>
</form>
<?php
session_start();
require("../../classes/Conexao.php");
require("../../classes/CreateEventos.php");

$class = new CreateEventos();
$class->mostrar();

if(isset($_POST['check'])){
    $class->delete($_POST['eventos']);
}
?>
    
