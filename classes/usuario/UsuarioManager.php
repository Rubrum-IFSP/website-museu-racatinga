<?php 
    class UsuarioManager extends Conexao {
        public function __construct() {
            if (session_id() == "") {
                session_start();
            }
        }

        public function cadastrar(Usuario $usuario) {}
        public function logar(Usuario $usuario) {
            $nome = $usuario->getNome();
            $senha = $usuario->getSenha();

            $mysqli = $this->conectar();
            $querySenha = "SELECT senha from Pessoa where senha='$senha'";
            $queryUser = "SELECT nome from Pessoa where nome='$nome'";
            $resultUser= mysqli_query($mysqli,$queryUser)->fetch_assoc();
            $resultSenha = mysqli_query($mysqli,$querySenha)->fetch_assoc();
            if($resultUser!=null && $resultSenha!=null)
            {
                $resultUser =current($resultUser);
                $resultSenha = current($resultSenha);
                if($nome==$resultUser && $senha ==$resultSenha) return true;
                else return false;
            }
            else return false;
        }
        public function mudarSenha(Usuario $usuario) {
            $cpf = $usuario->getCpf();
            $rg = $usuario->getRg();
            $senha = $usuario->getSenha();
            
            $query = "SELECT * FROM Pessoa WHERE cpf ='$cpf' AND rg = $rg";
            $resultQuery = mysqli_query($this->conectar(), $query);
            if(mysqli_num_rows($resultQuery)>0)
            {
                $queryUpdate = "UPDATE `Pessoa` SET `senha`='$senha' WHERE rg='1' AND cpf ='1'";
                mysqli_query($this->conectar(), $queryUpdate);
                return true;
            }
            else
            {
                echo "<script>alert('RG ou CPF não encontrados')</script>";
                return false;
            }
        }
        public function mostrarDados(string $username) {
            $listar = mysqli_query($this->conectar(),"SELECT nome, senha, rg, cpf FROM Pessoa WHERE nome='$username'");

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-perfil'>";
                    echo "<div class='informacoes-perfil'>";
                        echo "<div class='informacoes-top'>";
                            echo "<p><spam class='user-info-field'>Nome: </spam>".$linha[0]."</p>";
                            echo "<p><spam class='user-info-field'>Senha: </spam>".$linha[1]."</p>";
                            echo "<p><spam class='user-info-field'>RG: </spam>".$linha[2]."</p>";
                            echo "<p><spam class='user-info-field'>CPF: </spam>".$linha[3]."</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        }
        public function editarDados(Usuario $usuario) {}
        public function getUsuario(string $nome) {}
        public function procurarAdm() {
            $mysqli = $this->conectar();
            $query = "SELECT * FROM Pessoa where tipoUser='adm'";
            $queryResposta = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($queryResposta)>0) return true;
            else return false;
        }
        public function checarAdm() {
            if( !isset($_SESSION["logged"]) ) {
                header("location: ../../view/pages/loginAdmPagina.php");
                echo '<script>alert("Entre como admin antes de acessar esta pagina !")</script>';
            } else if ($_SESSION["logged"] == false || $_SESSION["admLogged"] == false) {
                header("location: ../../view/pages/loginAdmPagina.php");
                echo '<script>alert("Entre como admin antes de acessar esta pagina !")</script>';
            }
        }
    }
?>