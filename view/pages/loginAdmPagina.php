<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/loginAdmPagina.css">
</head>
<body>
<header>
    <img src="../images/logo_rubrum.png" alt="logo">
        <nav>
            <a href='../../index.php'>Página Inicial</a>
        </nav>
    </header>
<div class="container">
            <div class="card">
            <h1>Login ADM</h1>
    <form method="POST">
    <div class="input">
        <label class='input-label' for="nome">Nome:</label>
        <input class='input-field' type="text" name="usuario">
    </div>
    <div class="input">
        <label class='input-label' for="senha">Senha:</label>
        <input class='input-field' type="password" name="senha">
    </div>
<div class='action'>
        <input class='action-button'  type="submit" name="submit">
</div>
<div class='card-info'>
<p>Registro Amigo do Museu <a href="../components/cadastro.php" class="register-button">Registre-se agora!</a></p>

<p>Voltar<a href="../components/login.php">Log-in</a> </p>
</div>
    </form>

    <?php
        session_start();
        if(isset($_SESSION['failedLogin']) && $_SESSION["failedLogin"]){
            echo "<script>warn('Informações Errada(s)!')</script>";
            $_SESSION["failedLogin"]=false;
        }
       

        include("../../classes/Conexao.php");
        include("../../classes/AdmMenu.php");
        

        if(isset($_POST["usuario"])) {
            $AdmMenu = new AdmMenu();

            if ( $AdmMenu->procurarAdm() ) {
                $user = $_POST["usuario"];
                $pass =$_POST['senha'];
                
                if( $AdmMenu->logarAdm($user,$pass) ) 
                {
                    $validLogin = true;
                }

                else 
                {
                    $validLogin = false;
                }
            } 
            else 
            {
                if($_POST['usuario']=='administrador' && $_POST['senha']=='123456')
                {
                    $validLogin = true;
                } 

                else 
                { 
                    $validLogin = false;
                }
            }
            
            if ($validLogin){

                header("Location: ./mudarSenhaAdm.php");
            } 
            else {
                unset($_POST['usuario']);
                unset($_POST['senha']);
                header("location: ./loginAdmPagina.php");
                $_SESSION['failedLogin']=true;
            }
        }
    ?>
        </div>
    </div>
</body>
</html>