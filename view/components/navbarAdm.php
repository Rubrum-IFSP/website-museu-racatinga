<?php 
    if (session_id() == '') session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<header>
    <img src="/prototipo-museu-racatinga/view/images/logo_rubrum.png" alt="logo">
    <nav>
        <div class="navbar-background"></div>
        <span class="material-symbols-outlined menu-icon">menu</span>
        <div class="navbar-options">
            <div class="navbar-header">
                <span class="material-symbols-outlined close-nav-icon">close</span>
                <img src="/prototipo-museu-racatinga/view/images/logo_rubrum.png" alt="">
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
            <hr>
            <a href="/prototipo-museu-racatinga/view/pages/createAdm.php">
                Adicionar Peça ao Acervo
                <span class="material-symbols-outlined">inventory</span>
            </a>
            <a href="/prototipo-museu-racatinga/view/pages/deleteAdm.php">
                Deletar Peça ao Acervo
                <span class="material-symbols-outlined">delete_forever</span>
            </a>
            <a href="/prototipo-museu-racatinga/view/pages/updateAdm.php">
                Editar Peça do Acervo
                <span class="material-symbols-outlined">box_edit</span>
            </a>
            <hr>
            <a href="/prototipo-museu-racatinga/view/pages/createEvento.php">
                Adicionar Evento
                <span class="material-symbols-outlined">calendar_add_on</span>
            </a>
            <a href="/prototipo-museu-racatinga/view/pages/deleteEvento.php">
                Deletar Evento
                <span class="material-symbols-outlined">free_cancellation</span>
            </a>
            <a href="/prototipo-museu-racatinga/view/pages/updateEvento.php">
                Editar Evento
                <span class="material-symbols-outlined">edit_calendar</span>
            </a>

            <?php
                $logged = false;
                
                if(isset($_SESSION['amgLogged']) || isset($_SESSION['admLogged'])){
                    $logged=true;
                }

                if (!$logged) {
                    echo "<hr>
                    <a class='open-login-button'>
                        Entrar
                        <span class='material-symbols-outlined'>login</span>
                    </a>";
                }
                if(isset($_SESSION['amgLogged']) && $_SESSION['amgLogged'] == true){
                    echo 
                    "<a href='/prototipo-museu-racatinga/view/pages/ingressosPagina.php'>
                        Ingressos
                        <span class='material-symbols-outlined'>local_activity</span>
                    </a>";
                }
                if($logged) {
                    echo "<hr>
                    <a>".
                        $_SESSION['username'].
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
    <script src="/prototipo-museu-racatinga/view/js/navbar.js"></script>
</header>

