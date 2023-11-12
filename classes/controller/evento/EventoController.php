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

        public function adicionarEvento(EventoVO $evento) {            
            return $this->model->adicionarEvento($evento);
        }
        public function editarEvento($nomeEvento, EventoVO $novoEvento) {
            return $this->model->editarEvento($nomeEvento, $novoEvento);
        }
        public function removerEvento($nomeEvento) {
            return $this->model->removerEvento($nomeEvento);
        }

        public function listarNomeEventos() {
            return $this->model->listarNomeEventos();
        }

        public function listarEventos() {
            return $this->model->listarEventos();
        }
        public function getEvento($nomeEvento) : EventoVO {
            return $this->model->getEvento($nomeEvento);
        }
    }
?>