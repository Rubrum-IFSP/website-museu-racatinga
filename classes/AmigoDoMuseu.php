<?php
    class AmigoDoMuseu extends Conexao{

        public function cadastrar($nome, $senha, $cpf, $rg):bool
        {
            $cadastrado = false;
            $resultNome = mysqli_query($this->conectar(), "SELECT * FROM Pessoa where nome='$nome'");
            if(mysqli_num_rows($resultNome)>0)
            {
                echo '<script>alert("Já existe uma pessoa com este nome!")</script>'; 
            }
            else
            {
            $query = "INSERT INTO `Pessoa`(`tipoUser`, `nome`, `cpf`, `senha`, `rg`) VALUES('amg','$nome','$cpf','$senha','$rg')";
            $request = mysqli_query($this->conectar(),$query);
            $cadastrado= true;
            }
            return $cadastrado;
        }

        public function logar($user, $pass): bool
        {
            $mysqli = $this->conectar();
            $querySenha = "SELECT senha from Pessoa where senha='$pass'";
            $queryUser = "SELECT nome from Pessoa where nome='$user'";
            $resultUser= mysqli_query($mysqli,$queryUser)->fetch_assoc();
            $resultSenha = mysqli_query($mysqli,$querySenha)->fetch_assoc();
            if($resultUser!=null && $resultSenha!=null)
            {
                    $resultUser =current($resultUser);
                    $resultSenha = current($resultSenha);
                    if($user==$resultUser && $pass ==$resultSenha) return true;
                    else return false;
            }
            else return false;
            
        }
    }
?>