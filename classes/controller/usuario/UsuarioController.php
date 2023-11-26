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
        public function entrar($nome, $senha) {
            return $this->model->entrar($nome, $senha);
        }
        public function getUsuario($nome) {
            return $this->model->getUsuario($nome);
        }
        public function procurarAdm() {
            return $this->model->procurarAdm();
        }

    }
?>