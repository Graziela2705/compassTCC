<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../Bloqueio-Admin/login_admin.php');
    exit;
}
require 'db_connect.php';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$searchTermDisplay = $searchTerm; // Variável para exibição

$sql = "SELECT id, nome, email, data_registro, acesso_concedido FROM empresas";
if ($searchTerm) {
    $sql .= " WHERE nome LIKE ? OR email LIKE ?";
}
$stmt = $conn->prepare($sql);

if ($searchTerm) {
    $searchTerm = "%" . $searchTerm . "%"; // Adiciona os % para a consulta
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Empresas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
            color: #333;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Botões de ação */
        .action-button {
            background: none;
            border: none;
            cursor: pointer;
            color: #333;
            font-size: 18px;
            padding: 10px; /* Aumenta a área clicável */
            margin: 0 5px;
            display: inline-flex; /* Garante que o padding seja respeitado */
            align-items: center;
            justify-content: center;
        }

        .action-button:hover {
            color: #000000;
        }

        .green-icon {
            color: green;
        }

        .red-icon {
            color: red;
        }

        /* Barra de pesquisa */
        .search-bar {
            margin: 20px 0;
            display: flex;
            justify-content: center;
        }

        .search-bar form {
            display: flex;
            align-items: center;
        }

        .search-bar input[type="text"] {
            padding: 10px;
            width: 400px;
            border: 1px solid #ddd;
            border-radius: 20px 0 0 20px;
            border-right: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        h1 {
            text-align: center;
            color: #85a7b5;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div id="mensagem" class="message-box" style="display: none;"></div>
<h1>Gerenciar Empresas</h1>
<div class="search-bar">
    <form method="GET" action="gerenciar_empresas.php" id="search-form">
        <input type="text" name="search" placeholder="Pesquisar empresas por nome ou email" value="<?php echo htmlspecialchars($searchTermDisplay); ?>">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Registro</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['data_registro']); ?></td>
                <td><?php echo $row['acesso_concedido'] ? 'Concedido' : 'Não Concedido'; ?></td>
                <td>
                    <button class="action-button edit-button" data-id="<?php echo $row['id']; ?>">
                        <i class="fas fa-edit green-icon"></i>
                    </button>
                    <?php if (!$row['acesso_concedido']): ?>
                        <form method="POST" action="processar_acesso_empresa.php" style="display:inline;">
                            <input type="hidden" name="id_empresa" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="action-button"><i class="fas fa-unlock-alt green-icon"></i></button>
                        </form>
                    <?php else: ?>
                        <span>Já concedido</span>
                    <?php endif; ?>
                    <button class="action-button remove-button" data-id="<?php echo $row['id']; ?>">
                        <i class="fas fa-trash-alt red-icon"></i>
                    </button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhuma empresa encontrada.</p>
<?php endif; ?>

<script>
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            var companyId = this.getAttribute('data-id');
            window.location.href = 'editar_empresa.php?id=' + companyId;
        });
    });

    document.querySelectorAll('.remove-button').forEach(button => {
        button.addEventListener('click', function() {
            var companyId = this.getAttribute('data-id');

            if (confirm('Você realmente deseja remover esta empresa?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'processar_exclusao_empresa.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        var mensagem = document.getElementById('mensagem');
                        mensagem.style.display = 'block';
                        mensagem.className = 'message-box ' + (response.success ? 'success' : 'error');
                        mensagem.innerHTML = response.message;

                        button.closest('tr').remove();
                    }
                };
                xhr.send('company_id=' + companyId);
            }
        });
    });

    
</script>

</body>
</html>
