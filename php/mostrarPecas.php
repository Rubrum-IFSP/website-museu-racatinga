<?php
    // RESOLVER COMO COLOCAR UTF-8 (PARA NÃO CAUSAR ERRO COM Ç)
    
    include "./conexao.php";

    $listar =mysqli_query($conexao,"SELECT `descricao`, `ano`, `artista`, `nome` FROM `Pecas`;");

    while($linha=mysqli_fetch_array($listar)){
        echo "<div class='wrapperPeca'>";
        echo "<img src='imagem.png' width='200' height='200'>";
        echo "<span>".$linha[0]."</span>";
        echo "<span>".$linha[1]."</span>";
        echo "<span>".$linha[2]."</span>";
        echo "<span>".$linha[3]."</span>";
        echo "</div>";
    }
?>