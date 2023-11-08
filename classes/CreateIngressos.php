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
        

    }
    ?>
