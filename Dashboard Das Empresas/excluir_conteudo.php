<?php
if (isset($_GET['id'])) {
    // Conexão com o banco de dados
    $conn = new mysqli('localhost', 'root', '', 'compasstcc');

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Escapa o ID para evitar SQL Injection
    $id = $conn->real_escape_string($_GET['id']);

    // Consulta para buscar o caminho do arquivo antes de deletar
    $sql = "SELECT arquivo FROM referencias WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $arquivo = __DIR__ . '/' . $row['arquivo'];

        // Exclui o arquivo do servidor
        if (file_exists($arquivo)) {
            unlink($arquivo);
        }
    }

    // Exclui o registro do banco de dados
    $sql = "DELETE FROM referencias WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard_empresas.php");
        exit;
    } else {
        echo "Erro ao excluir conteúdo: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do conteúdo não especificado.";
}
?>
