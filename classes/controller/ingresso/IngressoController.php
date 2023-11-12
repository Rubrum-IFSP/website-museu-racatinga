<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once "$root/prototipo-museu-racatinga/classes/Conexao.php";
    require_once "$root/prototipo-museu-racatinga/classes/model/ingresso/IngressoManager.php";
    class IngressoController {
        private IngressoManager $model;
        public function __construct() {
            $this->model = new IngressoManager();
        }
        public function comprarIngresso($username, $idEvento) {
            return $this->model->comprarIngresso($username, $idEvento);
        }
    }
?>