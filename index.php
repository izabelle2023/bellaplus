<?php
session_start();

// Verifica se o usuário está logado
$usuarioLogado = isset($_SESSION['usuario_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bella+</title>
    <link rel="stylesheet" href="/bellaplus_revisado/css/index.css">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<body>

<header class="header">
    <div class="logo">
        <img src="img/logo.png" alt="Bella+">
    </div>
    <div class="menu nav-actions">
        <select id="idioma">
            <option value="pt">Português</option>
            <option value="en">English</option>
            <option value="es">Español</option>
        </select>
        <?php if ($usuarioLogado): ?>
            <button class="btn-entrar">Perfil</button>
        <?php else: ?>
            <a href="pags/login.php"><button class="btn-entrar">Entrar</button></a>
        <?php endif; ?>
    </div>
</header>

<hr>

<section class="banner">
    <div class="banner-content">
        <h1 id="titulo">Filmes, séries e tecnologia em um só lugar</h1>
        <p id="subtitulo">Assista conteúdos exclusivos da Bella+ quando quiser.</p>
        <div class="botoes">
            <a href="pags/login.php"><button class="btn-vermelho">Começar agora</button></a>
            <button id="saiba" class="btn-vermelho2">Saiba mais</button>
        </div>
    </div>
</section>

<section class="carousel" id="top-filmes-carousel">
    <h2>TOP FILMES</h2>
    <button class="arrow left" data-target="top-filmes">&#10094;</button>
    <div class="videos" id="top-filmes"></div>
    <button class="arrow right" data-target="top-filmes">&#10095;</button>
</section>

<section class="carousel" id="series-carousel">
    <h2>SÉRIES POPULARES</h2>
    <button class="arrow left" data-target="series">&#10094;</button>
    <div class="videos" id="series"></div>
    <button class="arrow right" data-target="series">&#10095;</button>
</section>

<section id="sobre" class="sobre">
    <h2>O que é a Bella+</h2>
    <p>A Bella+ é uma plataforma de streaming inovadora que oferece uma vasta seleção de filmes, séries e conteúdos
        relacionados à tecnologia. Nosso foco é proporcionar aos usuários uma experiência personalizada, acessível a
        qualquer hora e em qualquer dispositivo, reunindo entretenimento de qualidade e informações tecnológicas em
        um só lugar.</p>
</section>

<footer>© 2026 BELLA+ - DESENVOLVIDO POR <b>IZABELLE SILVA</b></footer>

<!-- MODAL -->
<div id="videoModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <iframe id="modalVideo" src="" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

<script>
    const usuarioLogado = <?php echo $usuarioLogado ? 'true' : 'false'; ?>;
</script>
<script src="js/index.js"></script>
</body>
</html>
