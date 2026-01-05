<?php
include '../db_connect.php'; // Certifique-se de que o caminho para o arquivo db_connect está correto

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagemMapa = $_FILES['imagem_mapa'];

    // Verifique se o arquivo foi enviado sem erros
    if ($imagemMapa['error'] == 0) {
        $nomeArquivo = $imagemMapa['name'];
        $caminhoTemp = $imagemMapa['tmp_name'];

        // Defina o diretório de destino
        $caminhoDestino = "../uploads/" . $nomeArquivo;

        // Mova o arquivo para o diretório de uploads
        if (move_uploaded_file($caminhoTemp, $caminhoDestino)) {
            // Insira apenas o nome do arquivo no banco de dados
            $sql = "INSERT INTO mapas_mentais (imagem) VALUES ('$nomeArquivo')";

            if ($conn->query($sql) === TRUE) {
                echo "Mapa mental adicionado com sucesso!";
            } else {
                echo "Erro ao salvar no banco de dados: " . $conn->error;
            }
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
