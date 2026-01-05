<?php
session_start();
include 'db_connect.php';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Consultar usuários com base na pesquisa
$sql = "SELECT id, nome, email FROM usuarios WHERE nome LIKE ? OR email LIKE ?";
$stmt = $conn->prepare($sql);
$searchWildcard = '%' . $searchTerm . '%';
$stmt->bind_param('ss', $searchWildcard, $searchWildcard);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        table th, table td {
            padding: 10px;
            text-align: center; /* Centraliza o texto */
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
            color: #333;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Botões de ações */
.action-button {
    background: none;
    border: none;
    cursor: pointer;
    color: #333;
    font-size: 18px; /* Aumenta o tamanho do ícone */
    margin: 0 5px; /* Espaço entre os ícones */
}

.action-button:hover {
    color:#1ab79d; /* Cor ao passar o mouse (pode manter ou alterar) */
}

.green-icon {
    color: green; /* Cor verde para o ícone de editar */
}

.red-icon {
    color: red; /* Cor vermelha para o ícone de excluir */
}


        /* Caixa de mensagem */
.message-box {
    padding: 15px;
    margin-bottom: 20px;
    color: white;
    font-weight: bold;
    text-align: center;
    border-radius: 5px;
}

.message-box.success {
    background-color: #4CAF50;
}

.message-box.error {
    background-color: #f44336;
}


        /* Barra de pesquisa */
        .search-bar {
            margin: 20px 0;
            display: flex;
            justify-content: center; /* Centraliza a barra de pesquisa */
        }

        .search-bar form {
            display: flex;
            align-items: center; /* Alinha verticalmente os itens */
        }

        .search-bar input[type="text"] {
            padding: 10px;
            width: 400px; /* Largura menor e fixa */
            border: 1px solid #ddd;
            border-radius: 20px 0 0 20px; /* Cantos arredondados à esquerda */
            border-right: none; /* Remove a borda direita */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        .search-bar button {
            padding: 10px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            border-radius: 0 20px 20px 0; /* Arredondar os cantos do botão */
            margin-left: -5px; /* Para sobrepor à borda do input */
            font-size: 16px; /* Aumenta o tamanho do ícone */
            margin-top: -10px; /* Ajusta a posição do botão para cima */
        }

        .search-bar button i {
            margin: ; /* Remove margem do ícone */
        }

        /* Caixa de mensagem */
        .message-box {
            padding: 15px;
            margin-bottom: 20px;
            color: white;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
        }

        .message-box.success {
            background-color: #85a7b5;
        }

        .message-box.error {
            background-color: #85a7b5;
        }
            /* Estilo do título */
        h1 {
            text-align: center; /* Centraliza o título */
            color: #85a7b5; /* Cor do texto */
            margin-top: 20px; /* Margem superior */
        }
    </style>
</head>
<body>


<h1>Gerenciar Usuários</h1> <!-- Título adicionado -->
<div class="search-bar">
    <form method="GET" action="gerenciar_usuarios.php" id="search-form">
        <input type="text" name="search" placeholder="Pesquisar usuários por nome ou email" value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit"><i class="fas fa-search"></i></button> <!-- Ícone de lupa -->
    </form>
</div>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td>
                    <button class="action-button edit-button" data-id="<?php echo $row['id']; ?>">
                        <i class="fas fa-edit green-icon"></i> <!-- Ícone de lápis -->
                    </button>
                    <button class="action-button remove-button" data-id="<?php echo $row['id']; ?>">
                        <i class="fas fa-trash-alt red-icon"></i> <!-- Ícone de lixeira -->
                    </button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhum usuário encontrado.</p>
<?php endif; ?>

<script>
    // Adicionar listeners aos botões de editar
    document.querySelectorAll('.edit-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-id');
            window.location.href = 'editar_usuario.php?id=' + userId;
        });
    });

    // Adicionar listeners aos botões de remover
    document.querySelectorAll('.remove-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var userId = this.getAttribute('data-id');

        if (confirm('Você realmente deseja remover este usuário?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'processar_exclusao_usuario.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Remover o usuário da tabela diretamente
                    button.closest('tr').remove();
                }
            };
            xhr.send('user_id=' + userId);
        }
    });
});



/// Quando o formulário for enviado, exibir a mensagem de sucesso
document.getElementById('editar-usuario-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Impede o envio tradicional do formulário

    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', this.action, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var mensagem = document.getElementById('mensagem');
            mensagem.style.display = 'block';
            mensagem.className = 'message-box success';
            mensagem.innerHTML = xhr.responseText;  // Exibe a mensagem recebida
        }
    };

    xhr.send(formData); // Envia os dados do formulário via AJAX
});


</script>
<div id="mensagem" style="display:none;"></div>
</body>
</html>
