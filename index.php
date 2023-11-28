<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    require "$root/prototipo-museu-racatinga/classes/controller/comentario/ComentarioController.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./view/css/index.css">
    <link rel="stylesheet" type="text/css" href="./view/css/loginWrapper.css">
    <link rel="shortcut icon" href="view/images/logo_rubrum.png" type="image/x-icon">
    <title>Museu de Racatinga</title>
</head>
<body>
    <?php 
        require($root.'/prototipo-museu-racatinga/view/components/navbar.php');
    ?>

    <section class="landing-section">
        <div class="background"></div>
        <h3>A história vive</h3>
        <h1>Museu de Racatinga</h1>
        <a href="./view/pages/equipe.php" style="z-index: 100">SOBRE</a>
    </section>

    <section class="contate-nos">
        <div id="quem-somos">
            <h2>Quem nós somos?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur sequi accusantium necessitatibus sapiente? Dolores consequuntur commodi corrupti ex ipsa repellat molestiae recusandae quia veritatis sunt? Quibusdam fugiat voluptatum libero vel.</p>
        </div>

        <div id="contato">
            <h2>Tendo algum problema?</h2>

            <div class="contato-container">
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
                        
                        if ( $email != '' && $comentario != '' ) {
                            $comentarioManager = new ComentarioManager();
                            $comentarioManager->criarComentario($email,$comentario);
                        }
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

</body>
</html>