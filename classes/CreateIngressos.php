<?php

    class CreateIngressos extends Conexao{
        //o parametro é o $amgLogged, $username e $idEvento(passado pelo <select>) guardados no SESSION
        public function comprar($logged, $username, $idEvento){
            if($logged)
                {
                $queryFindId = "SELECT id from Pessoa WHERE nome='$username'";
                $findIdReturn = mysqli_query($this->conectar(), $queryFindId);

                if(mysqli_num_rows($findIdReturn)>0)
                {
                    //finding id
                    while($row = mysqli_fetch_assoc($findIdReturn)){
                        $selectedProduct = $row['id'];
                        break;
                    }
                    $queryVerificarIngresso = "SELECT * FROM IngressoEvento WHERE idPessoa=$selectedProduct AND idEvento = $idEvento";
                    $returnVerificarIngresso = mysqli_query($this->conectar(),$queryVerificarIngresso);
                    if(mysqli_num_rows($returnVerificarIngresso)>0)
                    {
                        header("location: ../view/pages/ingressosPagina.php");
                    }
                    else
                    {   
                        $codigo = $selectedProduct + $selectedProduct * ($idEvento+2*$selectedProduct);
                        $queryCreateIngresso ="INSERT INTO `IngressoEvento`(`idPessoa`, `idEvento`,`codigo`, `dataCompra`) VALUES ($selectedProduct, $idEvento,'22222333',CURRENT_DATE)";
                        mysqli_query($this->conectar(), $queryCreateIngresso);
                    }
                }
            }
            else
            {
                header("location: ../view/pages/ingressosPagina.php");
            }
        }

        //recebe $_session['username']
        public function mostrarIngressos($username){
            $query = "SELECT id FROM Pessoa where nome = '$username'";
            $resultQuery = mysqli_query($this->conectar(), $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }
            $queryIngressos = "SELECT IngressoEvento.codigo, IngressoEvento.dataCompra FROM IngressoEvento where IngressoEvento.idPessoa = $selectedProduct";
            $resultIngressos = mysqli_query($this->conectar(), $queryIngressos);

            $resultIdEvento= mysqli_query($this->conectar(), "SELECT idEvento from IngressoEvento, Pessoa WHERE $selectedProduct = IngressoEvento.idPessoa");
            if(mysqli_num_rows($resultIdEvento)>0){
                while ($row = mysqli_fetch_assoc($resultIdEvento)){
                    $idEvento = $row['idEvento'];
                    break;  
                }
            }
            $resultNomeEvento= mysqli_query($this->conectar(),"SELECT nome from Evento, IngressoEvento WHERE  $idEvento = Evento.id ");



            while($linha=mysqli_fetch_array($resultIngressos)){
                echo "<div class='container-ingresso'>";
                    echo "<p><spam class='content-ingresso'>Codigo: </spam>".$linha[0]. "</p>";
                    echo "<p class='content-ingresso'>Data de Compra: ".$linha[1]."</p>";
                    while($linhaNomeEvento=mysqli_fetch_array($resultNomeEvento)){
                        echo "<p class='content-ingresso'>Evento: ".$linhaNomeEvento[0]."</p>";
                    }
                echo "</div>";
        }
        

    }
}
    ?>
