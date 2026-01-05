<?php
session_start();
require '../Dashboard Do Admin/db_connect.php'; // Ajuste o caminho se necessário

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empresa = $_POST['empresa'];
    $senha = $_POST['senha'];

    // Prepara a consulta para buscar a empresa
    $sql = "SELECT id, senha, acesso_concedido FROM empresas WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $empresa);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se a empresa foi encontrada
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $senha_armazenada, $acesso_concedido);
        $stmt->fetch();

        // Verifica se o acesso foi concedido
        if ($acesso_concedido) {
            // Verifica a senha
            if (password_verify($senha, $senha_armazenada)) {
                // Senha correta e acesso concedido
                $_SESSION['empresa_logged_in'] = true;
                $_SESSION['empresa_id'] = $id;
                header('Location: ../Dashboard Das Empresas/dashboard_empresas.php'); // Redireciona para o painel da empresa
                exit;
            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Acesso não concedido para esta empresa.";
        }
    } else {
        $erro = "Empresa não encontrada.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompassTCC - A Melhor plataforma de TCC</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="./favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>


    <div class="container">
        <i class="fas fa-lock icon"></i> <!-- Ícone de cadeado -->
        <h2>Área Restrita</h2>
        <?php if (isset($erro)): ?>
            <div class="erro"><?php echo htmlspecialchars($erro); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="empresa">Nome da Empresa:</label>
            <input type="text" id="empresa" name="empresa" required><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
