<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Conteúdo</title>
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
            border: 1px solid #ddd; /* Adiciona a borda ao formulário */
            padding: 20px;
            border-radius: 8px; /* Bordas arredondadas no formulário */
            background-color: #f9f9f9; /* Cor de fundo sutil */
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
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
    <h2>Adicionar Conteúdo</h2>

      <!-- Formulário de Dicas -->
      <div class="container section" id="form-dicas">
        <h3>Adicionar Dica</h3>
        <form action=" ../Conteúdos/Defesa de Tema/process_adicao_dica.php" method="post" enctype="multipart/form-data">
            <label for="imagem_dica">Imagem:</label>
            <input type="file" id="imagem_dica" name="imagem_dica" accept="image/*" required>

            <label for="titulo_dica">Título:</label>
            <input type="text" id="titulo_dica" name="titulo_dica" required>

            <label for="introducao_dica">Introdução:</label>
            <textarea id="introducao_dica" name="introducao_dica" required></textarea>

            <input type="submit" value="Adicionar Dica">
        </form>
    </div>


    <!-- Formulário de Vídeos -->
    <div class="container section">
        <h3>Adicionar Vídeo</h3>
        <form action="./Gerenciar vídeos de Tema/processar_adicao_video.php" method="POST" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>

            <label for="subtitulo">Subtítulo:</label>
            <input type="text" name="subtitulo" required>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required></textarea>

            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" accept="image/*" required>

            <button type="submit">Adicionar Vídeo</button>
        </form>
    </div>

    <!-- Formulário de Mapas Mentais -->
    <div class="container section" id="form-mapas-mentais">
        <h3>Adicionar Mapa Mental</h3>
        <form action="./Gerenciar Mapas/processar_adicao_mapa.php" method="post" enctype="multipart/form-data">
            <label for="imagem_mapa">Imagem:</label>
            <input type="file" id="imagem_mapa" name="imagem_mapa" accept="image/*" required>

            <input type="submit" value="Adicionar Mapa Mental">
        </form>
    </div>

</body>
</html>
