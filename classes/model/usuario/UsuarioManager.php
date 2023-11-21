<?php 
    class UsuarioManager extends Conexao {
        public function __construct() {
            if (session_id() == "") {
                session_start();
            }
        }

        public function cadastrar(UsuarioVO $usuario) {
            $tipoUsuario = $usuario->getTipoUsuario();
            $nome = strtolower($usuario->getNome());
            $cpf = $usuario->getCpf();
            $senha = $usuario->getSenha();
            $rg = $usuario->getRg();

            if ( $nome== '' || $cpf == '' || $senha == '' || $rg == '' ) {
                $_SESSION["registroMessage"] = "Preencha todos os campos!";
                return false;
            }

            $cadastrado = false;
            $resultNome = mysqli_query($this->conectar(), "SELECT * FROM Pessoa where nome='$nome'");
            
            if(mysqli_num_rows($resultNome)>0)
            {
                $_SESSION["registroMessage"] = "Este nome já está cadastrado.";
                return false;
            }
            $resultCpf = mysqli_query($this->conectar(), "SELECT * FROM Pessoa where cpf='$cpf'");
            if(mysqli_num_rows($resultCpf)>0)
            {
                $_SESSION["registroMessage"] = "Este CPF já está cadastrado.";
                return false;

            }
            $resultRg = mysqli_query($this->conectar(), "SELECT * FROM Pessoa where nome='$rg'");
            if(mysqli_num_rows($resultRg)>0)
            {
                $_SESSION["registroMessage"] = "Este RG já está cadastrado.";
                return false;
            }

            $query = "INSERT INTO `Pessoa`(`tipoUser`, `nome`, `cpf`, `senha`, `rg`) VALUES('amg','$nome','$cpf','$senha','$rg')";
            $cadastrado = mysqli_query($this->conectar(),$query);

            if ($cadastrado == true) {
                if ($tipoUsuario == "adm") {
                    $_SESSION["admLogged"] = true;
                    $_SESSION["amgLogged"] = false;
                } else {
                    $_SESSION["amgLogged"] = true;
                    $_SESSION["admLogged"] = false;
                }
                $_SESSION["username"] = $nome;
                $_SESSION["userpass"] = $senha;
            }
            
            return $cadastrado;
        }
        public function entrar(UsuarioVO $usuario) {
            $tipoUsuario = $usuario->getTipoUsuario();
            $nome = strtolower($usuario->getNome());
            $senha = $usuario->getSenha();

            $mysqli = $this->conectar();
            $querySenha = "SELECT senha from Pessoa where senha='$senha'";
            $queryUser = "SELECT nome from Pessoa where nome='$nome'";

            $resultUser= mysqli_fetch_row( mysqli_query($mysqli,$queryUser) );
            $resultSenha = mysqli_fetch_row( mysqli_query($mysqli,$querySenha) );

            if($resultUser!=null && $resultSenha!=null)
            {
                if($nome==$resultUser[0] && $senha ==$resultSenha[0]) {
                    if ($tipoUsuario == "adm") {
                        $_SESSION["admLogged"] = true;
                        $_SESSION["amgLogged"] = false;
                    } else {
                        $_SESSION["amgLogged"] = true;
                        $_SESSION["admLogged"] = false;
                    }
                    $_SESSION["username"] = $nome;
                    $_SESSION["userpass"] = $senha;
                    return true;
                }
            }
            
            $_SESSION["loginMessage"] = "O nome e/ou a senha inserida está errada.";
            return false;
        }
        public function mudarSenha(UsuarioVO $usuario, $novaSenha) {
            $cpf = $usuario->getCpf();
            $rg = $usuario->getRg();
            $senha = $usuario->getSenha();
            
            $query = "SELECT * FROM Pessoa WHERE cpf ='$cpf' AND rg = $rg";
            $resultQuery = mysqli_query($this->conectar(), $query);
            if(mysqli_num_rows($resultQuery)>0)
            {
                $queryUpdate = "UPDATE `Pessoa` SET `senha`='$novaSenha' WHERE rg='1' AND cpf ='1'";
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
        public function editarDados(UsuarioVO $usuario) {
            
        }
        public function getUsuario($nome) {
            $mysqli = $this->conectar();
            $query = "SELECT * FROM Pessoa where nome='$nome'";
            $resultado = mysqli_query($mysqli, $query);

            if (is_bool($resultado) || is_null($resultado)) return $resultado;
            
            $linha = mysqli_fetch_row($resultado);
            if ($linha != NULL) {
                return new UsuarioVO(
                    $linha[1],
                    $linha[2],
                    $linha[3],
                    $linha[4],
                    $linha[5]
                );
            } 

            throw new Exception("Usuário não encontrado.");
            return false;
        }
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