<?php
    class Acervo extends Conexao {

        private $conexao;

        public function __construct() {
            $this->conexao = $this->conectar();
        }

        public function listar( $offset = 0, $limit = 0 ) {
            $listar = mysqli_query($this->conexao,"SELECT `descricao`, `ano`, `artista`, `nome` FROM `Pecas` LIMIT $offset, $limit ;");

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='wrapperPeca'>";
                echo "<img src='imagem.png' width='200' height='200'>";
                echo "<span>".$linha[0]."</span>";
                echo "<span>".$linha[1]."</span>";
                echo "<span>".$linha[2]."</span>";
                echo "<span>".$linha[3]."</span>";
                echo "</div>";
            }
        }
    }
?>