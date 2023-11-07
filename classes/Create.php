<?php
    class Create extends Conexao{

        public function createFunction(String $evento, String $desc, String $ano, String $artista, String $nome){
            $mysqli = $this->conectar();
            $query = "SELECT id FROM Evento where nome = '$evento'";
            $resultQuery = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($resultQuery)>0){
                while ($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;  
                }
            }
            $idEvento = $selectedProduct;
            $resultNomePecas = mysqli_query($mysqli, "SELECT * FROM Pecas where nome='$nome'");
            if(mysqli_num_rows($resultNomePecas)>0)
            {
                echo '<script>alert("Já existe um item com este nome!")</script>'; 
            }
            else    
            {
                
                $query = "INSERT INTO `Pecas`(`idEvento`, `descricao`, `ano`, `artista`, `nome`) VALUES ($idEvento, '$desc', '$ano', '$artista', '$nome')";
                $queryCreate = mysqli_query($mysqli, $query);
            }
        }

        public function update(String $peca, String $desc, String $ano, String $artista, String $nome){
            $mysqli = $this->conectar();
            $query = "SELECT id FROM Pecas where nome = '$peca'";
            $resultQuery = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }
            $idPeca = $selectedProduct;
            $queryUpdate = "UPDATE `Pecas` SET `descricao`='$desc',`ano`='$ano',`artista`='$artista',`nome`='$nome' WHERE id = $idPeca";
            $resultQueryUpdate = mysqli_query($mysqli, $queryUpdate);
        }
        public function delete(String $peca){
            $mysqli =$this->conectar();
            $query = "DELETE FROM Pecas where nome='$peca'";
            $result = mysqli_query($mysqli, $query);
        }
        
    }

    
        
?>