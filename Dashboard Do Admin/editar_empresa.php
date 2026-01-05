<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../Bloqueio-Admin/login_admin.php');
    exit;
}
require 'db_connect.php';

// Verifica se o ID da empresa foi passado
if (!isset($_GET['id'])) {
    echo "ID da empresa não fornecido.";
    exit;
}

$id_empresa = $_GET['id'];

// Busca os detalhes da empresa no banco de dados
$sql = "SELECT nome, email, acesso_concedido FROM empresas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_empresa);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Empresa não encontrada.";
    exit;
}

$empresa = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Cor de fundo leve */
            padding: 20px; /* Espaçamento ao redor */
        }

        /* Estilo do formulário */
        form {
            background-color: white; /* Fundo branco */
            padding: 20px; /* Preenchimento interno */
            border: 2px solid #bbb; /* Borda mais clara */
            border-radius: 10px; /* Cantos arredondados */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Sombra */
            max-width: 500px; /* Largura máxima do formulário */
            margin: auto; /* Centraliza o formulário */
        }

        h1 {
            text-align: center; /* Centraliza o título */
            color: #333; /* Cor do título */
            margin-bottom: 20px; /* Espaço abaixo do título */
        }

        label {
            display: block; /* Cada rótulo ocupa uma linha */
            margin-bottom: 5px; /* Espaço abaixo do rótulo */
            font-weight: bold; /* Rótulo em negrito */
        }

        input[type="text"],
        input[type="email"] {
            width: 95%; /* Largura reduzida dos campos */
            padding: 10px; /* Preenchimento interno */
            border: 1px solid #ddd; /* Borda cinza */
            border-radius: 5px; /* Cantos arredondados */
            margin-bottom: 15px; /* Espaço abaixo do campo */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Sombra interna */
        }

        select {
            width: 95%; /* Largura reduzida do campo de seleção */
            padding: 10px; /* Preenchimento interno */
            border: 1px solid #ddd; /* Borda cinza */
            border-radius: 5px; /* Cantos arredondados */
            margin-bottom: 15px; /* Espaço abaixo do campo */
        }

        button[type="submit"] {
            background-color: #4CAF50; /* Cor de fundo verde */
            color: white; /* Cor do texto */
            padding: 10px; /* Preenchimento */
            border: none; /* Sem borda */
            border-radius: 5px; /* Cantos arredondados */
            cursor: pointer; /* Cursor de ponteiro ao passar o mouse */
            font-size: 16px; /* Tamanho da fonte */
            transition: background-color 0.3s; /* Transição suave */
            display: block; /* Faz o botão ser um bloco */
            margin: 0 auto; /* Centraliza o botão */
        }

        button[type="submit"]:hover {
            background-color: #45a049; /* Cor verde mais escura ao passar o mouse */
        }
    </style>
</head>
<body>
    <h1>Editar Empresa</h1>
    <form method="POST" action="processar_edicao_empresa.php">
        <input type="hidden" name="id" value="<?php echo $id_empresa; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($empresa['nome']); ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($empresa['email']); ?>" required>
        <label for="acesso_concedido">Acesso Concedido:</label>
        <select name="acesso_concedido" id="acesso_concedido">
            <option value="1" <?php if ($empresa['acesso_concedido']) echo 'selected'; ?>>Sim</option>
            <option value="0" <?php if (!$empresa['acesso_concedido']) echo 'selected'; ?>>Não</option>
        </select>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
