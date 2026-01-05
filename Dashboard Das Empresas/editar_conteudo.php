<?php
// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'compasstcc');

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Escapa o ID para evitar SQL Injection
    $id = $conn->real_escape_string($_GET['id']);

    // Busca os dados do conteúdo pelo ID
    $sql = "SELECT titulo, introducao, arquivo FROM referencias WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = $row['titulo'];
        $introducao = $row['introducao'];
        $arquivoAtual = $row['arquivo'];
    } else {
        echo "Conteúdo não encontrado.";
        exit;
    }

    $conn->close();
} else {
    echo "ID do conteúdo não especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Conteúdo</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="content">
        <h2>Editar Conteúdo</h2>
        <form action="atualizar_conteudo.php" method="post" enctype="multipart/form-data" id="perfil-form">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" required>

            <label for="introducao">Introdução:</label>
            <textarea id="introducao" name="introducao" required><?php echo htmlspecialchars($introducao); ?></textarea>

            <label for="arquivo">Arquivo (PDF):</label>
            <input type="file" id="arquivo" name="arquivo" accept="application/pdf">
            <p>Arquivo atual: <a href="<?php echo htmlspecialchars($arquivoAtual); ?>" target="_blank">Visualizar</a></p>

            <button type="submit">Atualizar Conteúdo</button>
        </form>
    </div>
</body>
</html>
