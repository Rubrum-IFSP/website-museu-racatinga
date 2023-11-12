<?php 
    class AcervoManager extends Conexao {
        private $conexao;
        private $pagina;
        private $limitePecas;
        private $totalPaginas;
        
        public function __construct() {
            $this->conexao = $this->conectar();
            $this->limitePecas = 15;

            if ( isset($_GET["pagina"]) ) {
                $this->pagina = $_GET["pagina"];
            } else {
                $this->pagina = 0;
            }
        }

        public function getPeca($id) {}

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
        public function adicionarPeca($evento, PecaVO $peca) : bool {
            $nome = $peca->getNome();
            $desc = $peca->getDescricao();
            $ano = $peca->getAno();
            $artista = $peca->getArtista();

            $mysqli = $this->conectar();
            $query = "SELECT id FROM Evento where nome = '$evento'";
            $resultQuery = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($resultQuery)>0){
                while ($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;  
                }
            }
            $idEvento = $selectedProduct;
            $resultNomePecas = mysqli_query($mysqli, "SELECT * FROM Pecas where nome='$nome'");
            if(mysqli_num_rows($resultNomePecas)>0) {
                echo '<script>alert("Já existe um item com este nome!")</script>'; 
                return false;
            } else {    
                $query = "INSERT INTO `Pecas`(`idEvento`, `descricao`, `ano`, `artista`, `nome`) VALUES ($idEvento, '$desc', '$ano', '$artista', '$nome')";
                return mysqli_query($mysqli, $query);
            }
        }
        public function editarPeca($nomePeca, PecaVO $novaPeca) : bool {
            $nome = $novaPeca->getNome();
            $desc = $novaPeca->getDescricao();
            $ano = $novaPeca->getAno();
            $artista = $novaPeca->getArtista();

            $mysqli = $this->conectar();
            $query = "SELECT id FROM Pecas where nome = '$nomePeca'";
            $resultQuery = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    break;
                }
            }
            $idPeca = $selectedProduct;
            $queryUpdate = "UPDATE `Pecas` SET `descricao`='$desc',`ano`='$ano',`artista`='$artista',`nome`='$nome' WHERE id = $idPeca";
            return mysqli_query($mysqli, $queryUpdate);
        }
        public function deletearPeca($nomePeca) {
            $mysqli =$this->conectar();
            $query = "DELETE FROM Pecas where nome='$nomePeca'";
            return mysqli_query($mysqli, $query);
        }
    }
?>