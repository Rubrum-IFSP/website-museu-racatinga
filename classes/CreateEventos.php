<?php
    class CreateEventos extends Conexao{

        public function create($nome, $data, $desc){
            $mysqli = $this->conectar();

            $query = "INSERT INTO `Evento`(`nome`, `dataEvento`, `descricao`) VALUES ('$nome',$data,'$desc')";
            $queryCreate = mysqli_query($mysqli, $query);
        }

        public function update($nome, $data, $desc){
            $mysqli = $this->conectar();
            $query = "SELECT id FROM Evento where nome = '$nome'";
            $resultQuery = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }
            $idEvento = $selectedProduct;
            $queryUpdate = "UPDATE `Evento` SET `nome`='$nome',`dataEvento`='$data',`descricao`='$desc' WHERE id=$idEvento";
            $resultQueryUpdate = mysqli_query($mysqli, $queryUpdate);
        }
        public function delete(String $evento){
            $mysqli =$this->conectar();
            $query = "SELECT id FROM Evento where nome = '$nome'";
            $resultQuery = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }
            $query = "DELETE FROM Pecas, Evento where idEvento = Evento.id";
            $result = mysqli_query($mysqli, $query);
        }
        
    }

    
        
?>