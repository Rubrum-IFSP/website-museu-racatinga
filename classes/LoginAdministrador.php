<?php
    class LoginAdministrador extends Conexao{
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
        public function mudarSenha($pass){
            $mysqli = $this->conectar();
            $query = "UPDATE `Pessoa` SET `senha`=$pass WHERE `tipoUser`='adm'";
            $result=  mysqli_query($mysqli,$query);
            
        }
    }
?>