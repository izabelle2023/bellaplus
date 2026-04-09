<?php
session_start();
require_once "con_geral.php"; // importa conexão

// Definir variável de controle de login
$usuarioLogado = isset($_SESSION['usuario_id']);
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifica senha criptografada
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['usuario_id'] = $user['id'];
                $_SESSION['usuario_nome'] = $user['nome'];
                $_SESSION['usuario_avatar'] = strtoupper(substr($user['nome'], 0, 1));

                header("Location: perfil.php");
                exit();
            } else {
                $erro = "Senha inválida!";
            }
        } else {
            $erro = "Usuário não encontrado!";
        }

        $stmt->close(); // fecha apenas se $stmt foi criado
    } else {
        $erro = "Erro na consulta ao banco!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Bella+</title>
    <link rel="stylesheet" href="../css/login.css">
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
        <?php if ($usuarioLogado): ?>
            <button class="btn-entrar">Perfil</button>
        <?php else: ?>
            <a href="cadastro.php"><button class="btn-entrar">Cadastrar</button></a>
        <?php endif; ?>
    </div>
</header>

<div class="login-container">
    <div class="logo-login">
        <img src="../img/logo.png" alt="Bella+">
    </div>
    <h2>Entrar na Bella+</h2>
    <?php if (!empty($erro)): ?>
        <p class="erro"><?php echo $erro; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit" class="btn-vermelho">Entrar</button>
    </form>
    <p><a href="../index.php">Voltar para Home</a></p>
</div>

<script src="../js/login.js"></script>

<section id="sobre" class="sobre">
    <h2>O que é a Bella+</h2>
    <br>
    <p>A Bella+ é uma plataforma de streaming inovadora que oferece uma vasta seleção de filmes, séries e conteúdos
        relacionados à tecnologia. Nosso foco é proporcionar aos usuários uma experiência personalizada, acessível a
        qualquer hora e em qualquer dispositivo, reunindo entretenimento de qualidade e informações tecnológicas em
        um só lugar.</p>
</section>

<footer>
    <p>&copy; 2026 Bella+. Todos os direitos reservados.</p>
</footer>
</body>
</html>
