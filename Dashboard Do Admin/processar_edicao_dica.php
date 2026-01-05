<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $titulo = $_POST['titulo_dica'];
    $introducao = $_POST['introducao_dica'];
    
    // Processar a imagem
    if (isset($_FILES['imagem_dica']) && $_FILES['imagem_dica']['error'] == UPLOAD_ERR_OK) {
        $imagemTmp = $_FILES['imagem_dica']['tmp_name'];
        $imagemNome = $_FILES['imagem_dica']['name'];
        
        // Garantir que a extensão seja preservada
        $extensao = pathinfo($imagemNome, PATHINFO_EXTENSION);
        $imagemDestino = 'uploads/' . basename($imagemNome); 
    
        // Verificar o tipo de arquivo
        $imagemTipo = mime_content_type($imagemTmp);
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    
        if (in_array($imagemTipo, $tiposPermitidos)) {
            // Mover a imagem para o diretório de uploads
            if (move_uploaded_file($imagemTmp, $imagemDestino)) {
                // Inserir os dados no banco de dados, incluindo a extensão correta
                $sql = "INSERT INTO dicas (titulo, introducao, imagem) VALUES ('$titulo', '$introducao', '$imagemDestino')";
    
                if ($conn->query($sql) === TRUE) {
                    echo "Dica adicionada com sucesso!";
                } else {
                    echo "Erro: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Erro ao mover a imagem para o diretório de uploads.";
            }
        } else {
            echo "Tipo de arquivo inválido. Apenas imagens JPEG, PNG e GIF são permitidas.";
        }
    } else {
        echo "Imagem não enviada ou ocorreu um erro no upload.";
    }
}    
