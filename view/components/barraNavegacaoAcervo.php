<div>
    <a href="./acervo.php?pagina=<?php 
        if ( isset( $_GET["pagina"] ) ) {
            if ( $_GET["pagina"] <= 0 ) { 
                echo $maxPaginas - 1; 
            } else {
                echo $_GET["pagina"] - 1;
            }
        } else {
            echo "0";
        }
    ?>">⬅️</a>

    <a href="./acervo.php?pagina=<?php 
        if ( isset( $_GET["pagina"] ) ) {
            if ( $_GET["pagina"] < $maxPaginas - 1 ) {
                echo $_GET["pagina"] + 1;
            } else  {
                echo "0";
            }
        } else {
            echo "0";
        }
    ?>">➡️</a>
        
</div>
