<?php
// Conexão com o banco de dados
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['video_titulo'];
    $subtitulo = $_POST['video_subtitulo'];
    $descricao = $_POST['video_descricao'];
    $url_video = $_POST['video_url'];

    // Lidar com o upload da imagem
    if (isset($_FILES['video_imagem']) && $_FILES['video_imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTemp = $_FILES['video_imagem']['tmp_name'];
        $imagemNome = basename($_FILES['video_imagem']['name']);
        $diretorioDestino = '../../Dashboard Do Admin/uploads/' . $imagemNome;

        // Mover o arquivo para o diretório de uploads
        if (move_uploaded_file($imagemTemp, $diretorioDestino)) {
            // Inserir dados no banco, incluindo o caminho da imagem
            $query = "INSERT INTO videos_manual (titulo, subtitulo, descricao, url, imagem) VALUES ('$titulo', '$subtitulo', '$descricao', '$url_video', '$imagemNome')";
            if ($conn->query($query)) {
                echo "Vídeo adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar vídeo: " . $conn->error;
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
