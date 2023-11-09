<?php
session_start();
if(isset($_SESSION['admLogged']) &&  $_SESSION['admLogged']){
    header("location: ./admMenu.php");

}
if(!isset($_SESSION['amgLogged']) || !$_SESSION['amgLogged']){
    header("location: ../components/login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crudAdm.css">
    <title>Museu Racatinga - Compra Ingressos</title>
</head>
<body>
    <header>
        <nav>
            <a href="../../index.php">Página Inicial</a>
            <a href="./acervo.php">Acervo</a>
            <a href='./deslogar.php' class='open-login-button'>Deslogar</a>
        </nav>
    </header>
    <main>
        <form method="post">
            <div>
            <select name="eventos">
                <?php    

                        $mysqli = mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
                        $query = "SELECT nome, id FROM Evento";
                        $result = mysqli_query($mysqli, $query);
                        
                        if(mysqli_num_rows($result)> 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                                $selectedProduct = $row['nome'];
                                $id = $row['id'];
                                echo "<option name='$id' value='$id'>$selectedProduct</option>";
                            }
                        }
                    


                ?>
            </select>
            </div>
            <div class='confirm-container'>
            
                <input type="checkbox" name="check">
                <label for='check' class='confirm-label'>Adquirir?</label>
            </div>
            <input type="submit" name="submitButton" value='Comprar'>
        </form>
    </main>
</body>

</html>

<?php

    require "../../classes/Conexao.php";
    require "../../classes/CreateIngressos.php";
    
    if(isset($_POST['eventos']) && isset($_POST['check'])){
        $idEvento = $_POST['eventos'];
        $username = $_SESSION['username'];
        echo $idEvento;
        echo $username;
            $class = new CreateIngressos();
            $return= $class->comprar(true, $username,$idEvento);

            if(!$return){
                echo "<script>alert('Você já possui o Ingresso para este evento!')</script>";
                header("location: ./ingressosPagina.php");
            }



    }

    // aq é a compra do ingresso, vc vai ter um form,***************** APENAS AMIGOS DO MUSEU PODEM ENTRAR NA PÁGINA INGRESSOS****************************
    // 1 input = <select> com o nome dos eventos * <option value='evento1' name='$id'>
    // 2 input check box "CERTEZA QUE QUER COMPRAR?"
    // 3 input  BUTTON COMPRAR INGRESSO

?>