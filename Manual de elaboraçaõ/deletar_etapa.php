<?php
// Inclua a conexão com o banco de dados
include 'db_connect.php';

// Verifique se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obter o caminho da imagem antes de deletar
    $query_select = "SELECT imagem FROM etapas_manual WHERE id = ?";
    $stmt_select = $conn->prepare($query_select);
    $stmt_select->bind_param("i", $id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $row = $result->fetch_assoc();
    
    // Verifica se a imagem existe e exclui o arquivo físico, se necessário
    if ($row && !empty($row['imagem'])) {
        $caminhoImagem = '../../Dashboard Do Admin/uploads/' . $row['imagem'];
        if (file_exists($caminhoImagem)) {
            unlink($caminhoImagem);
        }
    }

    // Consulta para deletar a etapa com base no ID
    $query_delete = "DELETE FROM etapas_manual WHERE id = ?";
    $stmt_delete = $conn->prepare($query_delete);
    $stmt_delete->bind_param("i", $id);

    if ($stmt_delete->execute()) {
        echo "<script>alert('Etapa excluída com sucesso!'); window.location.href='../../Dashboard Do Admin/visualizar_manual.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir etapa.'); window.location.href='../../Dashboard Do Admin/visualizar_manual.php';</script>";
    }

    // Fecha as declarações
    $stmt_select->close();
    $stmt_delete->close();
} else {
    echo "<script>alert('ID de etapa não fornecido.'); window.location.href='../../Dashboard Do Admin/visualizar_manual.php';</script>";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
