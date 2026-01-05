<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Vídeo - Multimídia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2, h3 {
            text-align: center;
            color: #85a7b5;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="url"],
        input[type="file"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button, input[type="submit"] {
            background-color: #85a7b5;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>
    <h2>Adicionar Vídeo - Multimídia</h2>

    <div class="container">
        <h3>Adicionar Vídeo</h3>
        <form action="../Conteúdos/Multimídia/processar_adicao_video.php" method="POST" enctype="multipart/form-data">
            <label for="imagem">Imagem do Vídeo:</label>
            <input type="file" name="imagem" accept="image/*" required>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>

            <label for="subtitulo">Subtítulo:</label>
            <input type="text" name="subtitulo" required>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required></textarea>

            <label for="link">Link do Vídeo:</label>
            <input type="url" name="link" required>

            <button type="submit">Adicionar Vídeo</button>
        </form>
    </div>

    
</body>
</html>
