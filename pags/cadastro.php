<?php
session_start();
require_once "con_geral.php"; // importa conexão

// Se já estiver logado, redireciona
if (isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senhaHash);

        if ($stmt->execute()) {
            $mensagem = "Cadastro realizado com sucesso! Agora faça login.";
        } else {
            $mensagem = "Erro ao cadastrar: " . $conn->error;
        }
        $stmt->close();
    } else {
        $mensagem = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Bella+</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>

<header class="header">
    <div class="logo">
        <img src="../img/logo.png" alt="Bella+">
    </div>
    <div class="menu nav-actions">
        <select id="idioma">
            <option value="pt">Português</option>
            <option value="en">English</option>
            <option value="es">Español</option>
        </select>
        <a href="login.php"><button class="btn-entrar">Entrar</button></a>
    </div>
</header>

<div class="cadastro-container">
    <div class="logo-login">
        <img src="../img/logo.png" alt="Bella+">
    </div>
    <h2>Cadastrar na Bella+</h2>
    <?php if (!empty($mensagem)): ?>
        <p class="mensagem"><?php echo $mensagem; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit" class="btn-vermelho">Cadastrar</button>
    </form>
    <p><a href="login.php">Já tem conta? Entrar</a></p>
</div>

<section id="sobre" class="sobre">
    <h2>O que é a Bella+</h2>
    <p>A Bella+ é uma plataforma de streaming inovadora que oferece uma vasta seleção de filmes, séries e conteúdos relacionados à tecnologia.</p>
</section>

<footer>
    <p>&copy; 2026 Bella+. Todos os direitos reservados.</p>
</footer>

<script src="../js/cadastro.js"></script>
</body>
</html>
