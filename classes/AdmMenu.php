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
            $querySenha = "SELECT senha from Pessoa where tipoUser= 'adm'";
            $queryUser = "SELECT nome from Pessoa where tipoUser='adm'";
            
            $resultUser =current(mysqli_query($mysqli,$queryUser)->fetch_assoc());
            $resultSenha = current(mysqli_query($mysqli,$querySenha)->fetch_assoc());


            if($user==$resultUser && $pass ==$resultSenha) return true;
            else return false;
        }
        public function mudarSenha($user, $senha, $rg, $cpf){
            $mysqli = $this->conectar();
            $query = "INSERT INTO `Pessoa`(`tipoUser`, `nome`, `cpf`, `senha`, `rg`) VALUES ('adm','$user','$cpf','$senha','$rg') ";
            $result=  mysqli_query($mysqli,$query);
            
        }
    }
?>