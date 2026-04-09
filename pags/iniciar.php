<?php
session_start();
require_once "con_geral.php";

$usuarioLogado = isset($_SESSION['usuario_id']);
$nome = "";

if ($usuarioLogado) {
    $idUsuario = (int) $_SESSION['usuario_id'];
    $sql = "SELECT nome FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    if ($usuario) {
        $nome = htmlspecialchars($usuario['nome']);
    }
}

$filmes = [
    ["titulo" => "Avengers: Endgame", "videoId" => "TcMBFSGVi1c"],
    ["titulo" => "Joker", "videoId" => "mqqft2x_Aa4"],
    ["titulo" => "Spider-Man: No Way Home", "videoId" => "JfVOs4VSpmA"],
    ["titulo" => "Doctor Strange", "videoId" => "aWzlQ2N6qqg"],
    ["titulo" => "Black Panther", "videoId" => "xjDjIWPwcPU"],
    ["titulo" => "Thor: Ragnarok", "videoId" => "ue80QwXMRHg"],
    ["titulo" => "Guardians of the Galaxy", "videoId" => "d96cjJhvlMA"],
    ["titulo" => "Iron Man", "videoId" => "8ugaeA-nMTc"],
    ["titulo" => "Captain America: Civil War", "videoId" => "dKrVegVI0Us"],
    ["titulo" => "Eternals", "videoId" => "x_me3xsvDgk"]
];

$series = [
    ["titulo" => "Stranger Things", "videoId" => "hA6hldpSTF8"],
    ["titulo" => "The Witcher", "videoId" => "x7Krla_UxRg"],
    ["titulo" => "The Mandalorian", "videoId" => "aOC8E8z_ifw"],
    ["titulo" => "Loki", "videoId" => "nW948Va-l10"],
    ["titulo" => "House of the Dragon", "videoId" => "DotnJ7tTA34"],
    ["titulo" => "The Boys", "videoId" => "5SKP1_F7ReE"],
    ["titulo" => "Peaky Blinders", "videoId" => "oVzVdvGIC7U"],
    ["titulo" => "Breaking Bad", "videoId" => "HhesaQXLuRY"],
    ["titulo" => "Game of Thrones", "videoId" => "KPLWWIOCOOQ"],
    ["titulo" => "The Matrix", "videoId" => "m8e-FF8MsqU"]

];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bella+</title>
<link rel="stylesheet" href="../css/iniciar.css">
</head>
<body>

<header class="header">
    <div class="logo">
        <img src="../img/logo.png" alt="Bella+">
        <?php if($usuarioLogado): ?>
            <span class="nome-usuario"><?php echo $nome; ?></span>
        <?php endif; ?>
    </div>
    <div class="menu">
        <select id="idioma">
            <option value="pt">Português</option>
            <option value="en">English</option>
            <option value="es">Español</option>
        </select>
        <?php if ($usuarioLogado): ?>
            <!-- Redireciona para o perfil -->
            <a href="perfil.php"><button class="btn-entrar">Perfil</button></a>
        <?php else: ?>
            <!-- Redireciona para login -->
            <a href="#"><button class="btn-entrar">Entrar</button></a>
        <?php endif; ?>
    </div>
</header>


<section class="banner">
    <h1 id="titulo">Filmes, séries e tecnologia em um só lugar</h1>
    <p id="subtitulo">Assista conteúdos exclusivos da Bella+ quando quiser.</p>
    <div class="botoes">
        <button class="btn-vermelho">Começar agora</button>
        <button id="saiba" class="btn-vermelho2">Saiba mais</button>
    </div>
</section>

<h2 id="filmesTitulo">TOP FILMES</h2>
<div class="carrossel">
    <button class="arrow left" data-target="top-filmes">&#9664;</button>
    <div class="videos" id="top-filmes">
        <?php foreach($filmes as $index => $filme): ?>
            <div class="video-card" data-video="<?= htmlspecialchars($filme['videoId']) ?>">
                <span class="numero"><?= $index + 1 ?></span>
                <img src="https://img.youtube.com/vi/<?= htmlspecialchars($filme['videoId']) ?>/hqdefault.jpg" alt="<?= htmlspecialchars($filme['titulo']) ?>" />
            </div>
        <?php endforeach; ?>
    </div>
    <button class="arrow right" data-target="top-filmes">&#9654;</button>
</div>

<h2 id="seriesTitulo">SÉRIES POPULARES</h2>
<div class="carrossel">
    <button class="arrow left" data-target="series">&#9664;</button>
    <div class="videos" id="series">
        <?php foreach($series as $index => $serie): ?>
            <div class="video-card" data-video="<?= htmlspecialchars($serie['videoId']) ?>">
                <span class="numero"><?= $index + 1 ?></span>
                <img src="https://img.youtube.com/vi/<?= htmlspecialchars($serie['videoId']) ?>/hqdefault.jpg" alt="<?= htmlspecialchars($serie['titulo']) ?>" />
            </div>
        <?php endforeach; ?>
    </div>
    <button class="arrow right" data-target="series">&#9654;</button>
</div>

<div id="videoModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <iframe id="modalVideo" src="" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

<section id="sobre" class="sobre">
    <h2 id="sobreTitulo">O que é a Bella+</h2>
    <p id="sobreTexto">A Bella+ é uma plataforma de streaming inovadora que oferece uma vasta seleção de filmes, séries e conteúdos relacionados à tecnologia. Nosso foco é proporcionar aos usuários uma experiência personalizada, acessível a qualquer hora e em qualquer dispositivo, reunindo entretenimento de qualidade e informações tecnológicas em um só lugar.</p>
</section>

<footer id="rodape">© 2026 Bella+. Todos os direitos reservados.</footer>

<script src="../js/iniciar.js"></script>
</body>
</html>
