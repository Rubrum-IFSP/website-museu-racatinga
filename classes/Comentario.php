<?php
    class Comentario extends Conexao{
        
        public function criarComentario($email, $comentario)
        {
            $mysqli = $this->conectar();
            $query = "INSERT INTO `Comentarios`(`email`, `mensagem`) VALUES ('$email','$comentario')";
            $result = mysqli_query($mysqli, $query);
        }

        public function mostrarComentarios()
        {
            $query = "SELECT `email`, `mensagem` FROM `Comentarios`";
            $listar = mysqli_query($this->conectar(),$query);

            while($linha=mysqli_fetch_array($listar)){
                echo "<div class='container-comment'>";
                    echo "<p><spam class='comment-email'>Email: ".$linha[0]. "</spam></p>";
                    echo "<p><spam class='comment-text'>Comentario: ".$linha[1]."</spam></p>";
                echo "</div>";
            }
        }
    }
?>