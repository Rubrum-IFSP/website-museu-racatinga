<div class="amigoMuseu-wrapper">
<span class="material-symbols-outlined close-icon">close</span>

<form action="#" class="account-wrapper login">
        <h1>Bem Vindo de Volta!</h1>
        <div class="userinfo-box">
            <label for="nome">Nome:</label>
            <input type="text" name="nomeLogin">
        </div>
        
        <div class="userinfo-box">
            <label for="">Senha: </label>
            <input type="text" name="senhaLogin">
        </div>

        <button type="submit" name="submit">Entrar</button>

        <div class="change-wrapper">
            <p>Não tem uma conta? <span class="register-button">Registre-se agora!</span></p>
        </div>
    </form>

    <form action="#" class="account-wrapper register">
        <h1>Bem Vindo ao Museu!</h1>
        <div class="userinfo-area">
            <div class="userinfo-box">
                <label for="nome">Nome:</label>
                <input type="text" name="nome">
            </div>
            
            <div class="userinfo-box">
                <label for="">Senha: </label>
                <input type="text" name="senha">
            </div>
        </div>

        <div class="userinfo-area">
            <div class="userinfo-box">
                <label for="">CPF: </label>
                <input type="text" name="cpf">
            </div>

            <div class="userinfo-box">
                <label for="">RG: </label>
                <input type="text" name="rg">
            </div>
        </div>

        <button type="submit" name="submit">Registrar</button>

        <div class="change-wrapper">
            <p>Já tem uma conta? <span class="login-button">Entre agora!</span></p>
        </div>
    </form>
    <?php
        if ( isset($_POST['submit']) ){
            require("../../classes/AmigoMuseu.php");
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];

            $AmigoDoMuseu = new AmigoDoMuseu();
            $AmigoMuseu->cadastrar($nome, $senha, $cpf, $rg);
            header("./login.php");
        }
    ?>
</div>

<script src="view/js/amAccountWrapper.js"></script>