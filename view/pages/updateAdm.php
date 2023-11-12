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
    <title>Museu Racatinga - Editar Peça</title>
</head>
<body>
        <?php 
            require '../components/navbarAdm.php';
        ?>

    <main>
    <h1>Editar Peças</h1>
        <form method="POST">
            <div>
                <label for="pecas">Escolher Peça: </label>
                <select name="pecas" id="pecas">
                    <option name="placeHolder" value="Escolha...">Escolha...</option>
                    <?php
                        $mysqli = mysqli_connect("18.230.6.129","HT301410X","HT301410X","HT301410X");
                        $query = "SELECT nome FROM Pecas";
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
                <label for="nome">Nome:  </label>
                <input type="text" name ="nome" id="nome" maxlength="100" required >
            </div>
            
            <div>
                <label for="artista">Artista: </label> 
                <input type="text" name="artista" id="artista" maxlength="100" required>
            </div>

            <div>
                <label for="ano">Ano: </label>
                <input type="date" name="ano" id="ano" required>
            </div>

            <div>
                <label for="descricao">Descrição: </label>
                <textarea type="text" name="desc" id="descricao" maxlength="300" required> </textarea>
            </div>

            <button type="submit">ALTERAR</button>
        </form>
    </main>
</body>
</html>
<?php
    if(isset($_POST['desc']) && isset($_POST['ano'])){
        if(isset($_POST['artista']) && isset($_POST['nome'])){
            if($_POST['pecas']!="Escolha..."){
                require "../../classes/controller/acervo/AcervoController.php";
                $controller = new AcervoController();
                $nomePeca = $_POST['pecas'];

                $novaPeca = new PecaVO(
                    $nome = $_POST['nome'],
                    $desc = $_POST['desc'],
                    $ano = $_POST['ano'],
                    $artista = $_POST['artista']
                );

                $controller->editarPeca($nomePeca, $novaPeca);
            }
            else{
                echo "<script>alert('Escolha um Evento Válido!')</script>";
            }
        }
    }
?>