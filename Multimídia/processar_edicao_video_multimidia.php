<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $descricao = $_POST['descricao'];
    $link = $_POST['link'];
    $caminho_imagem = '';

    // Verifique se uma nova imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nomeImagem = $_FILES['imagem']['name'];
        $caminhoTemporario = $_FILES['imagem']['tmp_name'];
        $caminho_imagem = '../../Dashboard Do Admin/uploads/' . $nomeImagem;

        // Move a imagem para a pasta de uploads
        if (!move_uploaded_file($caminhoTemporario, $caminho_imagem)) {
            echo "Erro ao enviar a imagem.";
            exit;
        }
    } else {
        // Se nenhuma nova imagem foi enviada, mantenha a imagem atual
        $caminho_imagem = $_POST['caminho_imagem_atual'];
    }

    // Atualize o vídeo no banco de dados
    $query = "UPDATE videos_multimidia SET titulo = ?, subtitulo = ?, descricao = ?, link = ?, caminho_imagem = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $titulo, $subtitulo, $descricao, $link, $caminho_imagem, $id);

    if ($stmt->execute()) {
        echo "Vídeo atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o vídeo.";
    }
} else {
    echo "Método de requisição inválido.";
}

$conn->close();
?>