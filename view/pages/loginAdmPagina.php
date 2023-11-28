<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/loginAdmPagina.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_rubrum.png" type="image/x-icon">
    <title>Login Administrador</title>
</head>
<body>
    <div class="card">
        <h1>Login ADM</h1>
        <?php 
            if (session_id() == '') session_start();

            if ( isset($_SESSION['failedLogin']) ) {
                echo "<div class='mensagemErro'>Informações inseridas incorretas.</div>";
                unset($_SESSION["failedLogin"]);
            }
        ?>

        <form method="POST" action="logarAdm.php">
            <div class="input">
                <label class='input-label' for="nome">Nome:</label>
                <input class='input-field' type="text" name="usuario">
            </div>

            <div class="input">
                <label class='input-label' for="senha">Senha:</label>
                <input class='input-field' type="password" name="senha">
            </div>

            <div class='action'>
                <button type="submit" name="login" class="action-button">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>



