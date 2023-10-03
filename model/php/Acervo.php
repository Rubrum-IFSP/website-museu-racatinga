<?php
    class Acervo extends Conexao {
        private $conexao;
        private $pagina;
        private $limitePecas;
        private $totalPaginas = 1; 

        public function __construct() {
            $this->conexao = $this->conectar();
            $this->limitePecas = 15;

            if ( isset($_GET["pagina"]) ) {
                $this->pagina = $_GET["pagina"];
            } else {
                $this->pagina = 0;
            }
        }

        public function getMaxPaginas() {
            $totalPecas = mysqli_query($this->conexao, "SELECT `id` FROM `Pecas`");
            $this->totalPaginas = ceil( $totalPecas->num_rows/$this->limitePecas );
            return $this->totalPaginas;
        }

        public function listar() {
            $offsetAtual = $this->pagina*$this->limitePecas;

            $listar = mysqli_query($this->conexao,"SELECT `descricao`, `ano`, `artista`, `nome` FROM `Pecas` LIMIT $offsetAtual, $this->limitePecas ;");

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-peca'>";
                    echo "<figure>";
                        echo "<img src='../images/imagem.png'>";
                        echo "<figcaption>".$linha[3]."</figcaption>";
                    echo "</figure>";
                    echo "<div class='informacoes-peca'>";
                        echo "<div class='informacoes-top'>";
                            echo "<p><spam class='peca-titulo'>Artista: </spam>".$linha[2]."</p>";
                            echo "<p><spam class='peca-titulo'>Ano de criação: </spam>".$linha[1]."</p>";
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