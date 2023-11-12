<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once "$root/prototipo-museu-racatinga/classes/Conexao.php";
    require_once "$root/prototipo-museu-racatinga/classes/model/evento/EventoVO.php";
    require_once "$root/prototipo-museu-racatinga/classes/model/evento/EventoManager.php";

    class EventoController extends Conexao {
        private EventoManager $model;
        public function __construct() {
            $this->model = new EventoManager();
        }

        public function listarNomeEventos() {
            return $this->model->listarNomeEventos();
        }

        public function listarEventos() {
            return $this->model->listarEventos();
        }
    }
?>