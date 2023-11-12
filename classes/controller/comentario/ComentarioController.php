<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require "$root/prototipo-museu-racatinga/classes/Conexao.php";
    require "$root/prototipo-museu-racatinga/classes/model/comentario/ComentarioManager.php";
    class ComentarioController {
        private ComentarioManager $model;
        public function __construct() {
            $this->model = new ComentarioManager();
        }
        public function criarComentario($email, $comentario) {
            return $this->model->criarComentario($email, $comentario);
        }
        public function mostrarComentarios() {
            return $this->model->mostrarComentarios();
        }
    }
?>