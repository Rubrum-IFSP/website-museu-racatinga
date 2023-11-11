<?php 
    class EventoVO {
        private string $nome;
        private string $descricao;
        private $data;

        public function getNome(): string {
            return $this->nome;
        }
        public function setNome($nome): void {
            $this->nome = $nome;
        }
        
        public function getDescricao(): string {
            return $this->descricao;
        }
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getData() {
            return $this->data;
        }
        public function setData($data): void {
            $this->data = $data;
        }

        public function __construct(string $nome, string $descricao, $data) {
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->data = $data;
        }
    }
?>