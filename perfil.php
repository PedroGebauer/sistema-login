<?php
// perfil.php - Página acessível apenas por usuários com nível "administrador"

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

if (($_SESSION['nivel'] ?? '') !== 'administrador') {
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Acesso negado</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>⛔ Acesso negado</h2>
            <p>Esta página é exclusiva para administradores.</p>
            <a href='painel.php'>Voltar ao painel</a>
        </div>
    </body>
    </html>";
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil administrativo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>🛠️ Perfil administrativo</h2>
        <p>Olá, <?php echo $usuario; ?>! Esta área é exclusiva para o nível "administrador".</p>

        <div class="logout">
            <a href="painel.php">Voltar ao painel</a>
        </div>
    </div>
</body>
</html>
