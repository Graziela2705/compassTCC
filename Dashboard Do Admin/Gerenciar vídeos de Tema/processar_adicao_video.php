<?php
include '../db_connect.php'; // Ajuste o caminho se necessário

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $descricao = $_POST['descricao'];

    // Verificar se a imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_temporal = $_FILES['imagem']['tmp_name'];
        $imagem_destino = '../uploads/' . basename($imagem_nome);

        if (move_uploaded_file($imagem_temporal, $imagem_destino)) {
            $sql = "INSERT INTO videos (titulo, subtitulo, descricao, caminho_imagem) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $titulo, $subtitulo, $descricao, $imagem_destino);

            if ($stmt->execute()) {
                echo "Vídeo adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar o vídeo: " . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Nenhuma imagem enviada ou ocorreu um erro no upload.";
    }
}

$conn->close();
?>
