<?php 
    class PecaVO {
        private string $nome;
        private string $descricao;
        private $ano;
        private string $artista;
        private $foto;
        private $evento;

        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getDescricao() {
            return $this->descricao;
        }
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
        public function getAno() {
            return $this->ano;
        }
        public function setAno($ano) {
            $this->ano = $ano;
        }
        public function getArtista() {
            return $this->artista;
        }
        public function setArtista($artista) {
            $this->artista = $artista;
        }
        public function getFoto() {
            return $this->foto;
        }
        public function setFoto($foto) {
           $this->foto = $foto; 
        }
        public function getEvento() {
            return $this->idEvento;
        }
        public function setEvento($idEvento) {
            $this->idEvento = $idEvento;
        }

        public function __construct($nome, $descricao, $ano, $artista,$foto) {
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->ano = $ano;
            $this->artista = $artista;
            $this->foto = $foto;
        }
    }
?>