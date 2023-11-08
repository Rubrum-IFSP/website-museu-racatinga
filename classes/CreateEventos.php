<?php
    class CreateEventos extends Conexao{

        public function create($nome, $data, $desc){
            $mysqli = $this->conectar();

            $query = "INSERT INTO `Evento`(`nome`, `dataEvento`, `descricao`) VALUES ('$nome',date '$data','$desc')";
            $queryVerificar = mysqli_query($mysqli, "SELECT * FROM Evento where nome='$nome'");
            if(mysqli_num_rows($queryVerificar)>0)
            {

                echo "<script>warn('Já existe um Evento com este nome')</script>";
            }
            else
            {
                $queryCreate = mysqli_query($mysqli, $query);
            }
        }

        public function update($nome, $data, $desc){
            $mysqli = $this->conectar();
            $query = "SELECT id FROM Evento where nome = '$nome'";
            $resultQuery = mysqli_query($mysqli, $query);

            //finding id
            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }

            
            $idEvento = $selectedProduct;
            $queryUpdate = "UPDATE `Evento` SET `nome`='$nome', dataEvento=DATE '$data',`descricao`='$desc' WHERE id=$idEvento";
            mysqli_query($mysqli, $queryUpdate); 




        }
        public function delete(String $evento){
            $mysqli =$this->conectar();
            $query = "SELECT id FROM Evento where nome = '$evento'";
            $resultQuery = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }
            $query = "DELETE FROM Pecas WHERE idEvento=$selectedProduct";
            mysqli_query($mysqli, $query);
            $query ="DELETE FROM Evento WHERE id=$selectedProduct";
            mysqli_query($mysqli, $query);

        }
        
        public function mostrar(){
            $query = "SELECT nome, descricao, dataEvento FROM Evento";
            $listar = mysqli_query($this->conectar(),$query);

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-event'>";
                    echo "<p><spam class='nome-event'>".$linha[0]."</spam></p>";
                    echo "<p><spam class='desc-event'>".$linha[1]."</spam></p>";
                    echo "<p><spam class='data-event'>".$linha[2]."</spam></p>";
                echo "</div>";
            }
        }

    }

        
    
        
?>
