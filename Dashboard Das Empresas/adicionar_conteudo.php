<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        // Conectando ao banco de dados
        $conn = new mysqli('localhost', 'root', '', 'compasstcc');
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Preparando os dados
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $introducao = $conn->real_escape_string($_POST['introducao']);
        $arquivoNome = $conn->real_escape_string(basename($_FILES['arquivo']['name']));
        $arquivoTemp = $_FILES['arquivo']['tmp_name'];
        $destino = __DIR__ . '/uploads/' . $arquivoNome; // Caminho absoluto para a pasta uploads

        // Verifica se a pasta uploads existe, se não, cria
        if (!is_dir(__DIR__ . '/uploads')) {
            mkdir(__DIR__ . '/uploads', 0777, true);
        }

        // Movendo o arquivo para a pasta de uploads
        if (move_uploaded_file($arquivoTemp, $destino)) {
            // Caminho relativo para ser armazenado no banco de dados
            $caminhoArquivoRelativo = 'uploads/' . $arquivoNome;

            // Inserindo dados no banco de dados
            $sql = "INSERT INTO referencias (titulo, introducao, arquivo) VALUES ('$titulo', '$introducao', '$caminhoArquivoRelativo')";
            if ($conn->query($sql) === TRUE) {
                header("Location: ../Conteúdos/Referências/index.php");
                exit;
            } else {
                echo "Erro ao adicionar conteúdo: " . $conn->error;
            }
        } else {
            echo "Erro ao mover o arquivo.";
        }

        $conn->close();
    } else {
        echo "Erro no upload do arquivo.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
