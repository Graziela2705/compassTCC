<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Manual de Elaboração</title>
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
        input[type="file"],
        textarea,
        input[type="url"] {
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

        .section {
            margin-bottom: 30px;
        }

        .section h3 {
            border-bottom: 2px solid #85a7b5;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Adicionar Manual de Elaboração</h2>

<!-- Exibir mensagem de sucesso ou erro -->
<?php if (!empty($mensagem)): ?>
    <div class="mensagem"><?= $mensagem; ?></div>
<?php endif; ?>

<!-- Formulário para Adicionar Etapas -->
<div class="container section" id="form-etapas">
    <h3>Adicionar Etapa</h3>
    <form action="../Conteúdos/Manual de elaboraçaõ/processar_adicao_etapa.php" method="POST" enctype="multipart/form-data">
        <label for="etapa-imagem">Imagem da Etapa:</label>
        <input type="file" id="etapa-imagem" name="etapa_imagem" accept="image/*">

        <label for="etapa-titulo">Título da Etapa:</label>
        <input type="text" id="etapa-titulo" name="etapa_titulo" required>

        <label for="etapa-descricao">Introdução:</label>
        <textarea id="etapa-descricao" name="etapa_descricao" required></textarea>

        <input type="submit" value="Adicionar Etapa">
    </form>
</div>

<!-- Formulário para Adicionar Vídeo -->
<div class="container section">
    <h3>Adicionar Vídeo</h3>
    <form action="../Conteúdos/Manual de elaboraçaõ/processar_adicao_video_manual.php" method="POST" enctype="multipart/form-data">
        <label for="video-imagem">Imagem do Vídeo:</label>
        <input type="file" id="video-imagem" name="video_imagem" accept="image/*" required>

        <label for="video-titulo">Título do Vídeo:</label>
        <input type="text" id="video-titulo" name="video_titulo" required>

        <label for="video-subtitulo">Subtítulo:</label>
        <input type="text" id="video-subtitulo" name="video_subtitulo" required>

        <label for="video-descricao">Descrição:</label>
        <textarea id="video-descricao" name="video_descricao" required></textarea>

        <label for="video-url">Link do Vídeo:</label>
        <input type="url" id="video-url" name="video_url" required>

        <button type="submit">Adicionar Vídeo</button>
    </form>
</div>

<!-- Formulário para Adicionar Mapas Mentais -->
<div class="container section" id="form-mapas-mentais">
    <h3>Adicionar Mapa Mental</h3>
    <form action="../Conteúdos/Manual de elaboraçaõ/processar_adicao_mapa_manual.php" method="POST" enctype="multipart/form-data">
        <label for="mapa-imagem">Imagem do Mapa Mental:</label>
        <input type="file" id="mapa-imagem" name="mapa_imagem" accept="image/*" required>

        <input type="submit" value="Adicionar Mapa Mental">
    </form>
</div>

</body>
</html>
