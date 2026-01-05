<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';

// Verifica se o ID do mapa mental foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para buscar o caminho da imagem
    $query = "SELECT imagem FROM mapas_mentais_manual WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $caminhoImagem = '../../Dashboard Do Admin/uploads/' . $row['imagem'];

        // Exclui o arquivo de imagem, se existir
        if (file_exists($caminhoImagem)) {
            unlink($caminhoImagem);
        }

        // Deleta o registro do mapa mental do banco de dados
        $deleteQuery = "DELETE FROM mapas_mentais_manual WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);

        if ($deleteStmt->execute()) {
            echo "<script>alert('Mapa mental excluído com sucesso!'); window.location.href = '../../Dashboard Do Admin/visualizar_manual.php';</script>";
        } else {
            echo "<script>alert('Erro ao excluir o mapa mental.'); window.location.href = '../../Dashboard Do Admin/visualizar_manual.php';</script>";
        }
    } else {
        echo "<script>alert('Mapa mental não encontrado.'); window.location.href = '../../Dashboard Do Admin/visualizar_manual.php';</script>";
    }

    $stmt->close();
    $deleteStmt->close();
} else {
    echo "<script>alert('ID do mapa mental não fornecido.'); window.location.href = '../../Dashboard Do Admin/visualizar_manual.php';</script>";
}

$conn->close();
?>
