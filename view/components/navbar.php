<?php 
    if (session_id() == '') session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
?>


<header>
    <link rel="stylesheet" href="/prototipo-museu-racatinga/view/css/navbar.css">
    <link rel="stylesheet" href="/prototipo-museu-racatinga/view/css/loginWrapper.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <a href="/prototipo-museu-racatinga/index.php"><img src="/prototipo-museu-racatinga/view/images/logo_rubrum.png" alt="logo"></a>
    <nav>
        <div class="navbar-background"></div>
        <span class="material-symbols-outlined menu-icon">menu</span>
        <div class="navbar-options">
            <div class="navbar-header">
                <span class="material-symbols-outlined close-nav-icon">close</span>
                <a href="/prototipo-museu-racatinga/index.php"><img src="/prototipo-museu-racatinga/view/images/logo_rubrum.png" alt=""></a>
            </div>

            <a href="/prototipo-museu-racatinga/index.php">
                Página Inicial
                <span class="material-symbols-outlined">home</span>
            </a>
            <a href="/prototipo-museu-racatinga/view/pages/acervo.php">
                Acervo
                <span class="material-symbols-outlined">menu_book</span>
            </a>
            <a href="/prototipo-museu-racatinga/view/pages/acervoEvento.php">
                Eventos
                <span class="material-symbols-outlined">event</span>
            </a>
            <?php
                $logged = false;
                
                if(isset($_SESSION['amgLogged']) || isset($_SESSION['admLogged'])){
                    $logged=true;
                }

                if(isset($_SESSION['amgLogged'])){
                    echo 
                    "<a href='/prototipo-museu-racatinga/view/pages/ingressosPagina.php'>
                        Ingressos
                        <span class='material-symbols-outlined'>local_activity</span>
                    </a>";
                }
                if ( isset($_SESSION['admLogged']) && $_SESSION['admLogged']==true ) {
                    echo "
                    <a href='/prototipo-museu-racatinga/view/pages/admMenu.php'>
                        Administrador
                        <span class='material-symbols-outlined'>settings</span>
                    </a>";
                } 
                if (!$logged) {
                    echo "<hr>
                    <a class='open-login-button'>
                        Entrar
                        <span class='material-symbols-outlined'>login</span>
                    </a>";
                }
                if($logged) {
                    echo "<hr>
                    <a href='/prototipo-museu-racatinga/view/pages/perfil.php?user=self'>".
                        "Perfil - ".$_SESSION['username'].
                        "<span class='material-symbols-outlined'>
                        account_circle</span>
                    </a>";
                    echo "
                    <a href='/prototipo-museu-racatinga/view/pages/deslogar.php'>
                        Sair
                        <span class='material-symbols-outlined'>logout</span>
                    </a>";
                }
            ?>
        </div>
    </nav>
    <?php require ($root.'/prototipo-museu-racatinga/view/components/contaAmigoMuseu.php'); ?>
    <script src="/prototipo-museu-racatinga/view/js/amAccountWrapper.js"></script>
    <script src="/prototipo-museu-racatinga/view/js/navbar.js"></script>
</header>