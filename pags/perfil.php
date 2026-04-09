<?php
session_start();
require_once "con_geral.php";

// Se não estiver logado, redireciona para login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$idUsuario = $_SESSION['usuario_id'];

// Buscar dados do usuário
$sql = "SELECT nome, email FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

// Avatar automático: primeira letra do nome
$avatarLetra = strtoupper(substr($usuario['nome'], 0, 1));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil - Bella+</title>
    <link rel="stylesheet" href="../css/perfil.css">
    <script src="../js/perfil.js" defer></script>
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
        <a href="logout.php"><button class="btn-entrar">Sair</button></a>
    </div>
</header>

<div class="perfil-container">
    <h2>Meu Perfil</h2>
    <div class="avatar-letra"><?php echo $avatarLetra; ?></div>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
    <p><strong>E-mail:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>

    <div class="acoes">
      <a href="iniciar.php"><button class="btn-vermelho">Home</button></a>
        <a href="logout.php"><button class="btn-vermelho">Sair da Conta</button></a>
    </div>
</div>

<footer>
    <p>&copy; 2026 Bella+. Todos os direitos reservados.</p>
</footer>
</body>
</html>
