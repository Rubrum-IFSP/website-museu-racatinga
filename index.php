<?php
    session_start();
    if(isset($_SESSION['amgLogged']) || isset($_SESSION['admLogged'])){
        $logged = true;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./view/css/index.css">
    <title>Museu de Racatinga</title>
</head>
<body>
    <header>
        <img src="./view/images/logo_rubrum.png" alt="logo">
        <nav>
            <?php
                if($_SESSION['admLogged']==true){
                    echo "<a href='./view/pages/admMenu.php'>Menu Administrador</a>";
                }
            ?>
            <a href="./view/pages/acervo.php">Acervo</a>
            <?php
                if ( isset($_SESSION['admLogged']) ) {
                    echo "<a href='./view/pages/admMenu.php'>Menu do Administrador</a>";
                } else if (!$logged) {
                    echo "<a class='open-login-button'>Login</a>";
                } 
            ?>
        </nav>
    </header>

    <section class="landing-section">
        <h3>A história vive</h3>
        <h1>Museu de Racatinga</h1>
        <a href="./view/pages/equipe.html">SOBRE</a>
    </section>

    <section class="contate-nos">
        <div id="quem-somos">
            <h2>Quem nós somos?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur sequi accusantium necessitatibus sapiente? Dolores consequuntur commodi corrupti ex ipsa repellat molestiae recusandae quia veritatis sunt? Quibusdam fugiat voluptatum libero vel.</p>
        </div>

        <div id="contato">
            <h2>Tendo algum problema?</h2>

            <div class="contato-container">
                <img src="./view/images/default_profile_pic.png" alt="profile-pic">

                <form method="POST">
                    <div>
                        <label for="email-contato">Email:</label>
                        <input type="email" name="email" id="email-contato">
                    </div>

                    <div>
                        <label for="fale-conosco-contato">Fale Conosco:</label>
                        <textarea type="text" name="fale-conosco-contato" id="fale-conosco-contato" limit="500"></textarea>
                    </div>

                    <button name="submitComentario" type="submit">Enviar</button>
                </form>
                <?php
                   if(isset($_POST['submitComentario']) ){
                       $email = $_POST['email'];
                       $comentario = $_POST['fale-conosco-contato'];
                       require("classes/Conexao.php");
                       require("classes/Comentario.php");
                       $Comentario = new Comentario();
                       $Comentario->criarComentario($email,$comentario);
                   } 
                ?>
            </div>
        </div>
    </section>

    <footer>
        <p>Horário: Segunda à Sexta, das 09H às 16H</p>

        <div class="contato">
            <p>
                Contatos:
                Email@email.com
                19 98123 4567
            </p>
        </div>
    </footer>

    <script src="./view/js/index.js"></script>
</body>
</html>