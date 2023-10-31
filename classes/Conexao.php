<?php

    abstract class Conexao {
        public function conectar() {
            return mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
        }
    }

?>