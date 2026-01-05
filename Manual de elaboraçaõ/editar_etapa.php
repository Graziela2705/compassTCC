<?php
include 'db_connect.php';

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Consulta para obter a etapa específica
    $query = "SELECT * FROM etapas_manual WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $etapa = $result->fetch_assoc();
} else {
    echo "ID da etapa não fornecido.";
    exit;
}

// Processar o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    // Verifica se uma nova imagem foi carregada
    if (!empty($_FILES['imagem']['name'])) {
        $imagem = '../../Dashboard Do Admin/uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    } else {
        $imagem = $etapa['imagem']; // Mantém a imagem existente
    }

    // Atualiza a etapa no banco de dados
    $query_update = "UPDATE etapas_manual SET titulo = ?, descricao = ?, imagem = ? WHERE id = ?";
    $stmt_update = $conn->prepare($query_update);
    $stmt_update->bind_param("sssi", $titulo, $descricao, $imagem, $id);

    if ($stmt_update->execute()) {
        // Define a mensagem de sucesso na sessão
        $_SESSION['mensagem_sucesso'] = "Etapa atualizada com sucesso!";
        // Redireciona para o dashboard com o parâmetro 'success'
        header("Location: ../../Dashboard Do Admin/dashboard_admin.php?success=1");
        exit;
    } else {
        echo "Erro ao atualizar a etapa.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Etapa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border: 2px solid #bbb;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        input[type="file"] {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            border: 1px solid #ddd;
            font-size: 16px;
            display: block;
            width: 100%;
            margin: 0 auto;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            display: block;
            margin: 0 auto;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        img {
            margin-top: 10px;
            border: 1px solid #ddd;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px; /* Ajuste o tamanho da imagem conforme necessário */
        }
    </style>
</head>
<body>

<h2>Editar Etapa</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo htmlspecialchars($etapa['titulo']); ?>" required><br>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" required><?php echo htmlspecialchars($etapa['descricao']); ?></textarea><br>

    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem"><br>
    <?php if (!empty($etapa['imagem']) && file_exists('../../Dashboard Do Admin/uploads/' . $etapa['imagem'])): ?>
        <img src="../../Dashboard Do Admin/uploads/<?php echo $etapa['imagem']; ?>" alt="Imagem da etapa"><br>
    <?php endif; ?>

    <button type="submit">Salvar Alterações</button>
</form>

</body>
</html>
