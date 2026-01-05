<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';
session_start(); // Inicie a sessão para garantir que ela esteja ativa

// Verifique se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para buscar os dados do vídeo com o ID fornecido
    $query = "SELECT * FROM videos_multimidia WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifique se o vídeo foi encontrado
    if ($result->num_rows > 0) {
        $video = $result->fetch_assoc();
    } else {
        echo "Vídeo não encontrado.";
        exit;
    }
} else {
    echo "ID do vídeo não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Vídeo</title>
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
            height: 100px;
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
            width: 100px;
        }
    </style>
</head>
<body>

<h2>Editar Vídeo</h2>
<form action="processar_edicao_video_multimidia.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $video['id']; ?>">

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo htmlspecialchars($video['titulo']); ?>" required><br>

    <label for="subtitulo">Subtítulo:</label>
    <input type="text" name="subtitulo" value="<?php echo htmlspecialchars($video['subtitulo']); ?>" required><br>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" required><?php echo htmlspecialchars($video['descricao']); ?></textarea><br>

    <label for="link">Link do Vídeo:</label>
    <input type="text" name="link" value="<?php echo htmlspecialchars($video['link']); ?>" required><br>

    <label for="imagem">Imagem Atual:</label><br>
    <?php if (!empty($video['caminho_imagem'])): ?>
        <img src="../../Dashboard Do Admin/uploads/<?php echo htmlspecialchars($video['caminho_imagem']); ?>" alt="Imagem do vídeo"><br>
    <?php endif; ?>

    <label for="imagem">Substituir Imagem:</label>
    <input type="file" name="imagem"><br>

    <button type="submit">Salvar Alterações</button>
</form>

</body>
</html>

<?php
$conn->close();
?>
