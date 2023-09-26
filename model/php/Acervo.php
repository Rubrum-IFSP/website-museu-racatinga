<?php
    class Acervo extends Conexao {
        private $conexao;
        private $pagina;
        private $limitePecas;
        private $totalPaginas = 1; 

        public function __construct() {
            $this->conexao = $this->conectar();
            $this->limitePecas = 10;

            if ( isset($_GET["pagina"]) ) {
                $this->pagina = $_GET["pagina"];
            } else {
                $this->pagina = 0;
            }
        }

        public function getMaxPaginas() {
            $totalPecas = mysqli_query($this->conexao, "SELECT `id` FROM `Pecas`");
            $arrayTotalPecas = mysqli_fetch_array( $totalPecas );

            $this->totalPaginas = ceil( sizeof($arrayTotalPecas)/$this->limitePecas );
            return $this->totalPaginas;
        }

        public function listar() {
            $offsetAtual = $this->pagina*$this->limitePecas;
            $limiteAtual = $offsetAtual + $this->limitePecas;

            $listar = mysqli_query($this->conexao,"SELECT `descricao`, `ano`, `artista`, `nome` FROM `Pecas` LIMIT $offsetAtual, $limiteAtual ;");

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-peca'>";
                    echo "<img src='../images/imagem.png'>";
                    echo "<div class='informacoes-peca'>";
                        echo "<div class='informacoes-top'>";
                            echo "<p>Nome da peça: ".$linha[3]."</p>";
                            echo "<p>Artista: ".$linha[2]."</p>";
                            echo "<p>Ano de criação: ".$linha[1]."</p>";
                        echo "</div>";
                        echo "<div class='informacoes-bottom'>";
                            echo "<p>".$linha[0]."</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        }
    }
?>