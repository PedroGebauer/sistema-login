<?php
// painel.php - Página protegida com boas-vindas

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$nivel = htmlspecialchars($_SESSION['nivel'] ?? 'usuario', ENT_QUOTES, 'UTF-8');
$login_em = htmlspecialchars($_SESSION['login_em'] ?? '', ENT_QUOTES, 'UTF-8');

if ($nivel === 'administrador') {
    $mensagem_nivel = '🛠️ Você tem acesso total ao sistema, incluindo a página de perfil administrativo.';
} else {
    $mensagem_nivel = '👤 Você tem acesso de usuário comum.';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>✅ Bem-vindo, <?php echo $usuario; ?>!</h2>
        <p>Você está logado com sucesso no sistema.</p>
        <p><strong>Nível de acesso:</strong> <?php echo $nivel; ?></p>
        <p><?php echo $mensagem_nivel; ?></p>
        <p><strong>Login realizado em:</strong> <?php echo $login_em; ?></p>

        <?php if ($nivel === 'administrador'): ?>
            <p><a href="perfil.php">Ver perfil administrativo</a></p>
        <?php endif; ?>

        <div class="logout">
            <a href="logout.php">Sair do sistema</a>
        </div>
    </div>
</body>
</html>
