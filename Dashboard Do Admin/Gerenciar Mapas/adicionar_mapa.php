<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Mapa Mental</title>
</head>
<body>
    <h2>Adicionar Mapa Mental</h2>
    <form action="processar_adicao_mapa.php" method="post" enctype="multipart/form-data">
        <label for="imagem_mapa">Imagem do Mapa:</label>
        <input type="file" id="imagem_mapa" name="imagem_mapa" accept="image/*" required><br><br>
        <input type="submit" value="Adicionar Mapa Mental">
    </form>
</body>
</html>
