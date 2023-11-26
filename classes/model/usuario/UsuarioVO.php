<?php
    class UsuarioVO {
        private $nome;
        private $username;
        private $tipoUsuario;
        private $cpf;
        private $rg;
        private $senha;

        public function __construct($tipoUsuario, $nome, $cpf, $senha, $rg, $username) {
            $this->tipoUsuario = $tipoUsuario;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->senha = $senha;
            $this->rg = $rg;
            $this->username = $username;
        }

        public function getNome () {
            return $this->nome;
        }

        public function setNome ($nome) {
            $this->nome = $nome;
        }

        public function getUsername() {
            return $this->username;
        }

        public function setUsername($username) {
            $this->username = $username;
        }

        public function getTipoUsuario () {
            return $this->tipoUsuario;
        }

        public function setTipoUsuario ($tipoUsuario) {
            $this->tipoUsuario = $tipoUsuario;
        }

        public function getCpf () {
            return $this->cpf;
        }

        public function setCpf ($cpf) {
            $this->cpf = $cpf;
        }

        public function getRg () {
            return $this->rg;
        }

        public function setRg ($rg) {
            $this->rg = $rg;
        }

        public function getSenha () {
            return $this->senha;
        }

        public function setSenha ($senha) {
            $this->senha = $senha;
        }
    }
?>