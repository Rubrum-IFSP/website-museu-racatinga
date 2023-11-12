<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once($root.'/prototipo-museu-racatinga/classes/Conexao.php');
    require_once($root.'/prototipo-museu-racatinga/classes/model/usuario/UsuarioVO.php');
    require_once($root.'/prototipo-museu-racatinga/classes/model/usuario/UsuarioManager.php');

    class UsuarioController {
        private UsuarioManager $model;
        public function __construct() {
            $this->model = new UsuarioManager();
        }
        public function cadastrar(UsuarioVO $usuario) {
            return $this->model->cadastrar($usuario);
        }
        public function entrar(UsuarioVo $usuario) {
            return $this->model->entrar($usuario);
        }
        public function getUsuario(string $nome, string $senha) {
            return $this->model->getUsuario($nome, $senha);
        }
        public function procurarAdm() {
            return $this->model->procurarAdm();
        }

    }
?>