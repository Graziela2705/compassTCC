<?php
// Conexão com o banco de dados
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['etapa_titulo'];
    $descricao = $_POST['etapa_descricao'];

    // Lidar com o upload da imagem
    if (isset($_FILES['etapa_imagem']) && $_FILES['etapa_imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTemp = $_FILES['etapa_imagem']['tmp_name'];
        $imagemNome = basename($_FILES['etapa_imagem']['name']);
        $diretorioDestino = '../../Dashboard Do Admin/uploads/' . $imagemNome;

        // Mover o arquivo para o diretório de uploads
        if (move_uploaded_file($imagemTemp, $diretorioDestino)) {
            // Inserir dados no banco, incluindo o caminho da imagem
            $query = "INSERT INTO etapas_manual (titulo, descricao, imagem) VALUES ('$titulo', '$descricao', '$imagemNome')";
            if ($conn->query($query)) {
                echo "Etapa adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar etapa: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }

    // Fechar a conexão
    $conn->close();
}
?>
