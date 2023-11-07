<?php
    class AmigoDoMuseu extends Conexao{

        public function cadastrar($nome, $senha, $cpf, $rg){
            $query = "INSERT INTO `Pessoa`(`tipoUser`, `nome`, `cpf`, `senha`, `rg`) VALUES('amg','$nome','$cpf','$senha','$rg')";
            $request = mysqli_query($this->conectar(),$query);
        }

        public function logar($nome, $senha){
            $query = "SELECT id FROM `Pessoa` WHERE nome='$nome' & senha='$senha'";
        }
    }
?>