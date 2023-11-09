<?php
    class CreateEventos extends Conexao{

        public function create($nome, $data, $desc):bool{
            $mysqli = $this->conectar();

            $query = "INSERT INTO `Evento`(`nome`, `dataEvento`, `descricao`) VALUES ('$nome',date '$data','$desc')";
            $queryVerificar = mysqli_query($mysqli, "SELECT * FROM Evento where nome='$nome'");
            if(mysqli_num_rows($queryVerificar)>0)
            {

                return false;
            }
            else
            {
                $queryCreate = mysqli_query($mysqli, $query);
                return true;
            }
        }

        public function update($nome,$novoNome, $data, $desc){
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

            $queryUpdate = "UPDATE `Evento` SET `nome`='$novoNome', `dataEvento` =DATE '$data',`descricao`='$desc' WHERE id=$selectedProduct";
            echo $selectedProduct;
            mysqli_query($mysqli, $queryUpdate); 

        }
        public function delete($idEvento){
            $mysqli =$this->conectar();

            $queryIngressos ="DELETE FROM IngressoEvento WHERE idEvento=$idEvento";
            mysqli_query($mysqli,$queryIngressos);
            $queryPecas = "DELETE FROM Pecas WHERE idEvento=$idEvento";
            mysqli_query($mysqli, $queryPecas);
            $queryEventos ="DELETE FROM Evento WHERE id=$idEvento";
            mysqli_query($mysqli, $queryEventos);

        }
        
        public function mostrar(){
            $query = "SELECT nome, descricao, dataEvento FROM Evento";
            $listar = mysqli_query($this->conectar(),$query);

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-event'>";
                    echo "<figure>";
                        echo "<img src='../view/images/imagem.png'>";
                    echo "</figure>";
                    echo "<p><spam class='nome-event'>".$linha[0]."</spam></p>";
                    echo "<p><spam class='desc-event'>".$linha[1]."</spam></p>";
                    echo "<p><spam class='data-event'>".$linha[2]."</spam></p>";
                echo "</div>";
            }
        }

    }

        
    
        
?>
