<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectando ao banco de dados
    $conn = new mysqli('localhost', 'root', '', 'compasstcc');
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Preparando os dados
    $id = $conn->real_escape_string($_POST['id']);
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $introducao = $conn->real_escape_string($_POST['introducao']);

    // Verificando se um novo arquivo foi enviado
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $arquivoNome = $conn->real_escape_string(basename($_FILES['arquivo']['name']));
        $arquivoTemp = $_FILES['arquivo']['tmp_name'];
        $destino = __DIR__ . '/uploads/' . $arquivoNome;

        if (!is_dir(__DIR__ . '/uploads')) {
            mkdir(__DIR__ . '/uploads', 0777, true);
        }

        // Movendo o novo arquivo
        if (move_uploaded_file($arquivoTemp, $destino)) {
            $caminhoArquivoRelativo = 'uploads/' . $arquivoNome;
            $sql = "UPDATE referencias SET titulo = '$titulo', introducao = '$introducao', arquivo = '$caminhoArquivoRelativo' WHERE id = $id";
        } else {
            echo "Erro ao mover o arquivo.";
            exit;
        }
    } else {
        // Atualizando sem modificar o arquivo
        $sql = "UPDATE referencias SET titulo = '$titulo', introducao = '$introducao' WHERE id = $id";
    }

    // Executando a atualização no banco de dados
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard_empresas.php");
        exit;
    } else {
        echo "Erro ao atualizar conteúdo: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
