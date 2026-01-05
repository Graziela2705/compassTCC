<?php
include 'db_connect.php';

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Consulta para obter o mapa mental específico
    $query = "SELECT * FROM mapas_mentais_manual WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $mapa = $result->fetch_assoc();
} else {
    echo "ID do mapa mental não fornecido.";
    exit;
}

// Processar o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se uma nova imagem foi carregada
    if (!empty($_FILES['imagem']['name'])) {
        $imagem = '../../Dashboard Do Admin/uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    } else {
        $imagem = $mapa['imagem']; // Mantém a imagem existente
    }

    // Atualiza o mapa mental no banco de dados
    $query_update = "UPDATE mapas_mentais_manual SET imagem = ? WHERE id = ?";
    $stmt_update = $conn->prepare($query_update);
    $stmt_update->bind_param("si", $imagem, $id);

    if ($stmt_update->execute()) {
        echo "Mapa mental atualizado com sucesso!";
        header("Location: ../../Dashboard Do Admin/dashboard_admin.php"); // Redireciona de volta para a lista
        exit;
    } else {
        echo "Erro ao atualizar o mapa mental.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Mapa Mental</title>
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

<h2>Editar Mapa Mental</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem"><br>
    <?php if (!empty($mapa['imagem']) && file_exists('../../Dashboard Do Admin/uploads/' . $mapa['imagem'])): ?>
        <img src="../../Dashboard Do Admin/uploads/<?php echo $mapa['imagem']; ?>" alt="Imagem do mapa mental"><br>
    <?php endif; ?>

    <button type="submit">Salvar Alterações</button>
</form>

</body>
</html>
