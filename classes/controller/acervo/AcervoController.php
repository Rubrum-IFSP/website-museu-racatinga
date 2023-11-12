<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once "$root/prototipo-museu-racatinga/classes/Conexao.php";
    require_once "$root/prototipo-museu-racatinga/classes/model/acervo/PecaVO.php";
    require_once "$root/prototipo-museu-racatinga/classes/model/acervo/AcervoManager.php";

    class AcervoController {
        private AcervoManager $model;

        public function __construct() {
            $this->model = new AcervoManager();
        }
        public function getMaxPaginas() : float {
            return $this->model->getMaxPaginas();
        }

        public function listar() {
            return $this->model->listar();
        }
        public function adicionarPeca($evento, PecaVO $peca) {
            return $this->model->adicionarPeca($evento, $peca);
        }
        public function deletarPeca($nomePeca) {
            return $this->model->deletarPeca($nomePeca);
        }
        public function editarPeca($nomePeca, PecaVO $novaPeca) {
            return $this->model->editarPeca($nomePeca, $novaPeca);
        }
    }
?>