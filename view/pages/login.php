<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginWrapper.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Login</title>
</head>
<body>
    <div class="amigoMuseu-wrapper">
    <span class="material-symbols-outlined">close</span>

    
    <form action="#" class="account-wrapper login">
            <h1>Bem Vindo de Volta!</h1>
            <div class="userinfo-box">
                <label for="nome">Nome:</label>
                <input type="text">
            </div>
            
            <div class="userinfo-box">
                <label for="">Senha: </label>
                <input type="text">
            </div>

            <button>Entrar</button>

            <div class="change-wrapper">
                <p>Não tem uma conta? <span class="register-button">Registre-se agora!</span></p>
            </div>
        </form>

        <form action="#" class="account-wrapper register">
            <h1>Bem Vindo ao Museu!</h1>
            <div class="userinfo-area">
                <div class="userinfo-box">
                    <label for="nome">Nome:</label>
                    <input type="text">
                </div>
                
                <div class="userinfo-box">
                    <label for="">Senha: </label>
                    <input type="text">
                </div>
            </div>

            <div class="userinfo-area">
                <div class="userinfo-box">
                    <label for="">CPF: </label>
                    <input type="text">
                </div>

                <div class="userinfo-box">
                    <label for="">RG: </label>
                    <input type="text">
                </div>
            </div>

            <button>Registrar</button>

            <div class="change-wrapper">
                <p>Já tem uma conta? <span class="login-button">Entre agora!</span></p>
            </div>
        </form>
    </div>

    <script src="../js/amAccountWrapper.js"></script>
</body>
</html>