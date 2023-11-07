<div class="amigoMuseu-wrapper">
<span class="material-symbols-outlined close-icon">close</span>

<form method="POST" class="account-wrapper login">
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
    <?php
        if(isset($_POST['senhaLogin']) && isset($_POST['nomeLogin'])){
            $nome = $_POST['nomeLogin'];
            $senha = $_POST['senhaLogin'];
            require "../../classes/Conexao.php";
            require "../../classes/AmigoDoMuseu.php";
            $classe = new AmigoDoMuseu();

            $logado = $classe->logar($nome,$senha);
            if($logado)
            {
                echo "logado";
            }
            else
            {
                echo "nao logado";
            }
            unset($_POST['nomeLogin']);
            unset($_POST['senhaLogin']);

        }
    ?>

    <form method ="POST" class="account-wrapper register">
        <h1>Bem Vindo ao Museu!</h1>
        <div class="userinfo-area">
            <div class="userinfo-box">
                <label for="nome">Nome:</label>
                <input required type="text" name="nome">
            </div>
            
            <div class="userinfo-box">
                <label for="">Senha: </label>
                <input required type="text" name="senha">
            </div>
        </div>

        <div class="userinfo-area">
            <div class="userinfo-box">
                <label for="">CPF: </label>
                <input required type="text" name="cpf" maxlength ='11'>
            </div>

            <div class="userinfo-box">
                <label for="">RG: </label>
                <input required type="text" name="rg" maxlength='9'>
            </div>
        </div>

        <button type="submit" name="submit">Registrar</button>

        <div class="change-wrapper">
            <p>Já tem uma conta? <span class="login-button">Entre agora!</span></p>
        </div>
    </form>
    <?php
        if ( isset($_POST['submit']) ){
            require("../../classes/Conexao.php");
            require("../../classes/AmigoDoMuseu.php");
            
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];

            $AmigoDoMuseu = new AmigoDoMuseu();
            $cadastrado = $AmigoDoMuseu->cadastrar($nome, $senha, $cpf, $rg);

            if($cadastrado)
            {
                echo '<script>alert("cadastro sucesso")</script>';
            }
            else
            {
                echo '<script>alert("nn deu certo o cadastro")</script>';
            }

            unset($_POST['nome']);
            unset($_POST['senha']);
            unset($_POST['cpf']);
            unset($_POST['rg']);
        }
    ?>
</div>

<script src="view/js/amAccountWrapper.js"></script>