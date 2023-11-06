<?php
    class Crud extends Conexao{

        public function showEventos(){
            $mysqli = $this->conectar();
            $query = "SELECT nome, id FROM Evento";
            $result = mysqli_query($mysqli, $query);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0 ){
                while($row = mysqli_fetch_assoc($result)){
                    $selectedProductName[] = $row['product_name'];
                }
            }

            
        echo "<select>";
        foreach($selectedProductName as $optionName){
          echo "<option value=".$optionName.">".$optionName."</option>";
        }  
        echo "</select>";
        }
    }
?>