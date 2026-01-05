<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';

// Verifica se o ID do vídeo foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obter o caminho da imagem associada ao vídeo
    $query_imagem = "SELECT imagem FROM videos_manual WHERE id = ?";
    $stmt = $conn->prepare($query_imagem);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $caminhoImagem = '../../Dashboard Do Admin/uploads/' . $row['imagem'];

        // Remove o arquivo de imagem se existir
        if (file_exists($caminhoImagem)) {
            unlink($caminhoImagem);
        }
    }

    // Consulta para deletar o vídeo do banco de dados
    $query_delete = "DELETE FROM videos_manual WHERE id = ?";
    $stmt_delete = $conn->prepare($query_delete);
    $stmt_delete->bind_param("i", $id);

    if ($stmt_delete->execute()) {
        echo "<script>alert('Vídeo excluído com sucesso!'); window.location.href='../../Dashboard Do Admin/visualizar_manual.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir o vídeo.'); window.location.href='../../Dashboard Do Admin/visualizar_manual.php';</script>";
    }
} else {
    echo "<script>alert('ID do vídeo não fornecido.'); window.location.href='../../Dashboard Do Admin/visualizar_manual.php';</script>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
