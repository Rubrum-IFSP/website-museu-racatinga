<?php
 session_start();
 if ( $_SESSION["admLogged"]==false ) {
     header("Location: ./loginAdmPagina.php");
 }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crudAdm.css">
    <link rel="shortcut icon" href="../images/logo_rubrum.png" type="image/x-icon">
    <title>Museu Racatinga - Editar Evento</title>
</head>
<body>
        <?php 
            require '../components/navbarAdm.php';
        ?>

    <main>
    <h1>Editar Evento</h1>
        <form method="POST">
            <div>
                <label for="eventos">Escolher Peça: </label>
                <select name="eventos" id="eventos">
                    <option name="placeHolder" value="Escolha...">Escolha...</option>
                    <?php
                        $mysqli = mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
                        $query = "SELECT nome FROM Evento";
                        $result = mysqli_query($mysqli, $query);
                        
                        if(mysqli_num_rows($result)> 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                                $selectedProduct = $row['nome'];
                                echo "<option name='$selectedProduct' value='$selectedProduct'>$selectedProduct</option>";
                            }
                        }
                    ?>
                </select>
            </div>

            <div>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" maxlength="100" required>
            </div>

            <div>
                <label for="data">Data: </label>
                <input type="date" name="data" id="data" required>
            </div>
            
            <div>
                <label for="desc">Descrição: </label> 
                <textarea type="text" name="desc" id="desc" maxlength="300" required></textarea>
            </div>
                


            <button type="submit">Alterar</button>
        </form>
    </main>
</body>
</html>
<?php
    if(isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['desc'])){
        if($_POST['eventos']!="Escolha..."){
            require "../../classes/controller/evento/EventoController.php";

            $nomeEvento = $_POST['eventos'];
            $controller = new EventoController();

            $novoEvento = new EventoVO(
                $_POST['nome'],
                $_POST['desc'],
                $_POST['data']
            );

            $controller->editarEvento($nomeEvento, $novoEvento);
        } else echo "<script>alert('Escolha um Evento Válido!')</script>";
    }
?>