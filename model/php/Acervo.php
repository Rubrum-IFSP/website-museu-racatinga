<?php
    class Acervo extends Conexao {
        private $conexao;
        private $pagina;
        private $limitePecas;
        private $totalPaginas;

        public function __construct() {
            $this->conexao = $this->conectar();
            $this->limitePecas = 10;

            if ( isset($_GET["pagina"]) ) {
                $this->pagina = $_GET["pagina"];
            } else {
                $this->pagina = 0;
            }

        }

        public function listar() {
            $offsetAtual = $this->pagina*$this->limitePecas;
            $limiteAtual = $offsetAtual + $this->limitePecas;

            $listar = mysqli_query($this->conexao,"SELECT `descricao`, `ano`, `artista`, `nome` FROM `Pecas` LIMIT $offsetAtual, $limiteAtual ;");
            $totalPecas = mysqli_query($this->conexao, "SELECT `id` FROM `Pecas`");

            $arrayTotalPecas = mysqli_fetch_array( $totalPecas );

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='wrapperPeca'>";
                echo "<img src='./php/imagem.png' width='200' height='200'>";
                echo "<span>".$linha[0]."</span>";
                echo "<span>".$linha[1]."</span>";
                echo "<span>".$linha[2]."</span>";
                echo "<span>".$linha[3]."</span>";
                echo "</div>";
            }

            echo "Pagina ", $this->pagina + 1, " de ", ceil( sizeof($arrayTotalPecas)/$this->limitePecas );
        }
    }
?>