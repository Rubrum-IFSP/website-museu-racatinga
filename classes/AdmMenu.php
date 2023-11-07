<?php 
    class AdmMenu extends Conexao {
        
        public function procurarAdm() : bool 
        {
            $mysqli = $this->conectar();
            $query = "SELECT * FROM Pessoa where tipoUser='adm'";
            $queryResposta = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($queryResposta)>0) return true;
            else return false;
        }
        public function verificarAdm($logado){
            if(!$logado)
            {
                header("location: ../../view/pages/loginAdmPagina.php");
                echo '<script>alert("Entre como admin antes de acessar esta pagina !")</script>';
            }
        }

        public function logarAdm($user, $pass) :bool
        {
            $mysqli = $this->conectar();
            $queryLogin = "SELECT * FROM Adm WHERE senha='$pass' AND nome='$user'";
            $returnQuery = mysqli_query($mysqli, $queryLogin);

            if(mysqli_num_rows($returnQuery)>0) return true;
            else return false;

        }
        public function mudarSenha($user, $senha, $rg, $cpf){
            $mysqli = $this->conectar();
            $queryUpdate = "UPDATE `Adm` SET `nome`='$user',`senha`='$senha',`cpf`='$cpf',`rg`='$rg' WHERE nome='administrador' AND  senha='123456' ";
            $queryInsert = "INSERT INTO `Adm`( `nome`,`senha`) VALUES ('administrador','123456')";
            mysqli_query($mysqli,$queryUpdate);
            mysqli_query($mysqli,$queryInsert);
            
        }
    }
?>