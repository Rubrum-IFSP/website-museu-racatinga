<?php 
    class AdmMenu extends Conexao {
        
        public function procurarAdm() : bool {
            $mysqli = $this->conectar();
            $query = "SELECT * FROM Pessoa where tipoUser='adm'";
            $queryResposta = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($queryResposta)>0) return true;
            else return false;
        }
        public function verificarAdm(){

        }
    }
?>