<?php 
    class EventoManager extends Conexao {
        public function adicionarEvento(EventoVO $evento) {
            $mysqli = $this->conectar();
            $nome = $evento->getNome();
            $data = $evento->getData();
            $desc = $evento->getDescricao();

            $query = "INSERT INTO `Evento`(`nome`, `dataEvento`, `descricao`) VALUES ('$nome',date '$data','$desc')";
            $queryVerificar = mysqli_query($mysqli, "SELECT * FROM Evento where nome='$nome'");
            if(mysqli_num_rows($queryVerificar)>0)
            {
                return false;
            }
            else
            {
                return mysqli_query($mysqli, $query);
            }
        }
        public function editarEvento($nomeEvento, EventoVO $novoEvento) {
            $mysqli = $this->conectar();
            $novoNome = $novoEvento->getNome();
            $novaData = $novoEvento->getData();
            $novaDesc = $novoEvento->getDescricao();

            $query = "SELECT id FROM Evento where nome = '$nomeEvento'";
            $resultQuery = mysqli_query($mysqli, $query);

            //finding id
            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }

            $queryUpdate = "UPDATE `Evento` SET `nome`='$novoNome', `dataEvento` =DATE '$novaData',`descricao`='$novaDesc' WHERE id=$selectedProduct";
            echo $selectedProduct;
            mysqli_query($mysqli, $queryUpdate); 

        }
        public function removerEvento($idEvento) {
            $mysqli =$this->conectar();

            $queryIngressos ="DELETE FROM IngressoEvento WHERE idEvento=$idEvento";
            mysqli_query($mysqli,$queryIngressos);
            $queryPecas = "DELETE FROM Pecas WHERE idEvento=$idEvento";
            mysqli_query($mysqli, $queryPecas);
            $queryEventos ="DELETE FROM Evento WHERE id=$idEvento";
            mysqli_query($mysqli, $queryEventos);
        }
        public function listarNomeEventos() {
            $mysqli = $this->conectar();
            $query = "SELECT nome, id FROM Evento";

            $result = mysqli_query($mysqli, $query);
            $resultCheck = mysqli_num_rows($result);
            
            if($resultCheck > 0 ){
                while($row = mysqli_fetch_assoc($result)){
                    $selectedProductName[] = $row['nome'];
                }
            }
                
            echo "<select>";
            foreach($selectedProductName as $optionName){
                echo "<option value=".$optionName.">".$optionName."</option>";
            }  
            echo "</select>";
        }

        public function listarEventos() {
            $query = "SELECT nome, descricao, dataEvento FROM Evento";
            $listar = mysqli_query($this->conectar(),$query);

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-event'>";
                    echo "<div>";
                        echo "<div class='information-upper'>";
                            echo "<p class='evento-title'>$linha[0]</p>";
                            echo "<p class='evento-title'>$linha[2]</p>";
                            if ( isset($_SESSION["admLogged"]) || isset($_SESSION["amgLogged"]) ) echo "<p class='evento-title'><a href='./ingressosPagina.php'>Comprar Ingresso</a>";
                            else echo "<p class='evento-title ingresso-link'>Entre com uma conta para comprar seu ingresso";
                            echo "</p>";
                        echo "</div>";
                        echo "<div class='information-down'>";
                            echo "<p class='evento-title'>Descrição: </p>";
                            echo "<p>$linha[1]</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        }
        public function getEvento($nomeEvento) {
            $mysqli = $this->conectar();
            $query = "SELECT * FROM Evento where nome = '$nomeEvento'";
            $resultQuery = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    return new EventoVO(
                        $row["nome"],
                        $row["descricao"],
                        $row["dataEvento"]
                    );
                }
            }
            return false;
        }

    }
?>