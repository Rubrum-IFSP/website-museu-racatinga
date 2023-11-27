<?php 
    class IngressoManager extends Conexao {
        public function comprarIngresso($username, $idEvento) {
            if (session_id() == '') session_start();

            $queryFindId = "SELECT id from Pessoa WHERE nick='$username'";
            $findIdReturn = mysqli_query($this->conectar(), $queryFindId);

            if(mysqli_num_rows($findIdReturn)>0)
            {
                //finding id
                while($row = mysqli_fetch_assoc($findIdReturn)){
                    $selectedProduct = $row['id'];
                    break;
                }
                
                $codigo = ($idEvento+2)*random_int(2, 100) + $selectedProduct;
                $queryCreateIngresso ="INSERT INTO `IngressoEvento`(`idPessoa`, `idEvento`,`codigo`, `dataCompra`) VALUES ($selectedProduct, $idEvento,$codigo,CURRENT_DATE)";
                mysqli_query($this->conectar(), $queryCreateIngresso);
                $_SESSION["ingressoMessage"] = "Compra Realizada Com Sucesso!<br>(Ingressos comprados podem ser vistos em seu perfil)";
                return true;
            }
            else
            {
                $_SESSION["ingressoMessage"] = "Erro ao Realizar compra.";
                return false;
            }
        }
        public function mostrarIngressos($username) {
            $query = "SELECT id FROM Pessoa where nick = '$username'";
            $resultQuery = mysqli_query($this->conectar(), $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }
            $queryIngressos = "SELECT IngressoEvento.codigo, IngressoEvento.dataCompra, IngressoEvento.idEvento FROM IngressoEvento where IngressoEvento.idPessoa = $selectedProduct";
            $resultIngressos = mysqli_query($this->conectar(), $queryIngressos);

            echo "<div class='ingresso-wrapper'>";
            while($linha=mysqli_fetch_array($resultIngressos)){
                echo "<div class='container-ingresso'>";
                    echo "<p><spam class='titulo-ingresso'>Codigo: </spam>".$linha[0]. "</p>";
                    echo "<p><spam class='titulo-ingresso'>Data de Compra: </spam>".$linha[1]."</p>";
                    $idEvento = $linha[2];
                    $resultEvento = mysqli_query($this->conectar(),"SELECT nome From Evento WHERE id=$idEvento");
                    while($linhaEvento =mysqli_fetch_array($resultEvento)){
                        echo "<p><spam class='titulo-ingresso'>Evento: </spam>".$linhaEvento[0]."</p>";
                    }
                echo "</div>";
            }
            echo "</div>";
        }
    }
?>
