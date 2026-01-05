<?php
session_start();
include 'db_connect.php';

$user_id = $_GET['id'] ?? null;
$user = null;

if ($user_id) {
    $sql = "SELECT id, nome, email FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
}

// Processa a edição se a requisição for POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $update_sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param('ssi', $nome, $email, $user_id);
    $update_stmt->execute();

    // Retorna apenas a mensagem
    echo 'Usuário editado com sucesso!';
    exit; // Interrompe a execução para não continuar gerando a tabela
}



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

        h2 {
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

        button[type="submit"] {
            background-color: #1ab79d; /* Cor de fundo verde */
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
            background-color: #1ab79d; /* Cor verde mais escura ao passar o mouse */
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Espaço acima da tabela */
            font-family: Arial, sans-serif; /* Fonte da tabela */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra da tabela */
        }

        table th, table td {
            padding: 10px;
            text-align: center; /* Centraliza o texto */
            border-bottom: 1px solid #1ab79d; /* Borda inferior */
        }

        table th {
            background-color: #1ab79d; /* Fundo das cabeçalhos */
            color: #333; /* Cor do texto */
        }

        table tr:nth-child(even) {
            background-color: #1ab79d; /* Cor de fundo das linhas pares */
        }

        /* Botões de ações */
        .edit-button, .remove-button {
            background: none; /* Sem fundo */
            border: none; /* Sem borda */
            cursor: pointer; /* Cursor de ponteiro */
            color: #333; /* Cor do texto */
            font-size: 16px; /* Tamanho da fonte */
            margin: 0 5px; /* Espaço entre os botões */
        }

        .edit-button:hover {
            color: #4CAF50; /* Cor ao passar o mouse para editar */
        }

        .remove-button:hover {
            color: red; /* Cor ao passar o mouse para remover */
        }
    </style>
</head>
<body>

<h2>Editar Usuário</h2> <!-- Título centralizado -->

<form method="POST" action="editar_usuario.php?id=<?php echo $user['id']; ?>">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($user['nome']); ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    <button type="submit">Salvar</button>
</form>


</body>
</html>
