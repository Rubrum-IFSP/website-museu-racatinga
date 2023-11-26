<?php
    session_start();
    if(!isset($_SESSION['amgLogged']) || !isset($_SESSION['admLogged'])){
        header("location: ../../index.php");
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
    <style>
        form {
            margin-top: 80px;
        }
        h1 {
            margin-top: 0;
        }
        .message {
            width: 100%;
            text-align: center;
            font-size: 1.5em;
            font-weight: 700;
            background-color: crimson;
            color: white;
            margin: 10px 0 30px 0;
            padding: 5px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php require "../components/navbar.php"; ?>
    <main>
        <form method="POST" action="./compraIngresso.php">
            <h1>Comprar Ingresso Para Evento</h1>
            <div>
                <?php
                    if (isset($_SESSION["ingressoMessage"])) {
                        echo "<p class='message'>$_SESSION[ingressoMessage]</p>";
                        unset($_SESSION["ingressoMessage"]);
                    }
                ?>
                <label for="evento">Nome do Evento: </label>
                <select name="eventos" id="evento">
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
                <label for="qtd">Quantidade de Ingressos: </label>
                <input type="number" name="quantidade-ingressos" id="qtd" value="1" min="1" max="10" require/>
            </div>

            <div class='confirm-container'>
                <label for='check' class='confirm-label'>Confirmar Compra</label>
                <input type="checkbox" name="check" id="check">
            </div>

            <input type="submit" name="submitButton" value='Comprar'>
        </form>
    </main>
</body>

</html>

<?php    

    // aq é a compra do ingresso, vc vai ter um form,***************** APENAS AMIGOS DO MUSEU PODEM ENTRAR NA PÁGINA INGRESSOS****************************
    // 1 input = <select> com o nome dos eventos * <option value='evento1' name='$id'>
    // 2 input check box "CERTEZA QUE QUER COMPRAR?"
    // 3 input  BUTTON COMPRAR INGRESSO

?>