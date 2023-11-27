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

        public function getPeca($id) {
            $mysqli = $this->conectar();
            $query = "SELECT * FROM Pecas where id='$id'";
            $resultado = mysqli_query($mysqli, $query);

            if (is_bool($resultado) || is_null($resultado)) return $resultado;
            
            $linha = mysqli_fetch_row($resultado);
            if ($linha != NULL) {
                return new PecaVO(
                    $linha[5],
                    $linha[2],
                    $linha[3],
                    $linha[4],
                    $linha[6]
                );
            } 

            return false;
        }
        public function getMaxPaginas() {
            $totalPecas = mysqli_query($this->conexao, "SELECT `id` FROM `Pecas`");
            $this->totalPaginas = ceil( $totalPecas->num_rows/$this->limitePecas );
            return $this->totalPaginas;
        }
        public function listar() {
            $offsetAtual = $this->pagina*$this->limitePecas;

            $listar = mysqli_query($this->conexao,"SELECT `id`, `descricao`, `ano`, `artista`, `nome`, `imagem` FROM `Pecas` LIMIT $offsetAtual, $this->limitePecas ;");

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-peca'>";
                    echo "<figure>";
                        if ($linha[5] != null) {
                            echo "<img src='../imgAcervo/$linha[5]'>";
                        } else {
                            echo "<img src='../images/imagem.png'>";
                        }
                    echo "</figure>";
                    echo "<div class='informacoes-peca'>";
                        echo "<h2><spam class='peca-titulo'>".$linha[4]."</spam></h2>";
                        echo "<div class='informacoes-top'>";
                            echo "<p><spam class='peca-titulo'>Artista: </spam>".$linha[3]."</p>";
                            echo "<p><spam class='peca-titulo'>Ano de criação: </spam>".$linha[2]."</p>";
                        echo "</div>";
                        echo "<div class='informacoes-bottom'>";
                            echo "<a href='./verPeca.php?peca=$linha[0]'><button class='saiba-mais'>Saiba Mais</button></a>";
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
            $foto = $peca->getFoto();

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
                $query = "INSERT INTO `Pecas`(`idEvento`, `descricao`, `ano`, `artista`, `nome`,`imagem`) VALUES ($idEvento, '$desc', '$ano', '$artista', '$nome','$foto')";
                return mysqli_query($mysqli, $query);
            }
        }
        public function editarPeca($nomePeca, PecaVO $novaPeca) : bool {
            $nome = $novaPeca->getNome();
            $desc = $novaPeca->getDescricao();
            $ano = $novaPeca->getAno();
            $artista = $novaPeca->getArtista();
            $foto = $novaPeca->getFoto();

            $mysqli = $this->conectar();
            $query = "SELECT id , imagem FROM Pecas where nome = '$nomePeca'";
            $resultQuery = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedProduct = $row['id'];
                    $selectedImage = $row['imagem'];
                    break;
                }
            }
            unlink("../../imgAcervo/../view/pages/imgAcervo/$selectedImage");
            $idPeca = $selectedProduct;
            $queryUpdate = "UPDATE `Pecas` SET `descricao`='$desc',`ano`='$ano',`artista`='$artista',`nome`='$nome', `imagem`='$foto' WHERE id = $idPeca";
            return mysqli_query($mysqli, $queryUpdate);
        }
        public function deletarPeca($nomePeca) {
            $mysqli =$this->conectar();
            $query = "DELETE FROM Pecas where nome='$nomePeca'";

            $queryImagem = "SELECT imagem FROM Pecas where nome = '$nomePeca'";
            $resultQuery = mysqli_query($mysqli, $queryImagem);

            if(mysqli_num_rows($resultQuery)>0){
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $selectedImage = $row['imagem'];
                    break;
                }
            }
            unlink("../../imgAcervo/../view/pages/imgAcervo/$selectedImage");
            return mysqli_query($mysqli, $query);
        }
    }
?>