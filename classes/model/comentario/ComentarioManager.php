<?php
    class ComentarioManager extends Conexao {
        
        public function criarComentario($email, $comentario)
        {
            $mysqli = $this->conectar();
            $query = "INSERT INTO `Comentarios`(`email`, `mensagem`) VALUES ('$email','$comentario')";
            return mysqli_query($mysqli, $query);
        }

        public function mostrarComentarios()
        {
            $query = "SELECT `email`, `mensagem` FROM `Comentarios` ORDER BY id DESC";
            $listar = mysqli_query($this->conectar(),$query);

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-comment'>";
                    echo "<p class='email-text'><spam class='comment-email'>Email: </spam>".$linha[0]. "</p>";
                    echo "<p class='comment-text'>".$linha[1]."</p>";
                echo "</div>";
            }
        }
    }
?>