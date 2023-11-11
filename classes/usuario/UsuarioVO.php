<?php
    class UsuarioVO {
        private $nome;
        private $email;
        private $tipoUsuario;
        private $cpf;
        private $rg;
        private $senha;

        public function __construct($nome, $email, $tipoUsuario, $cpf, $rg, $senha) {
            $this->nome = $nome;
            $this->email = $email;
            $this->tipoUsuario = $tipoUsuario;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->senha = $senha;
        }

        public function getNome () {
            return $this->nome;
        }

        public function setNome ($nome) {
            $this->nome = $nome;
        }

        public function getEmail () {   
            return $this->email;
        }

        public function setEmail ($email) { 
            $this->email = $email;
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