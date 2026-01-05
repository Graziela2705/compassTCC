<?php
// Incluindo a conexão com o banco de dados
include('db_connect.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Verifica se uma imagem foi enviada
    if (isset($_FILES['mapa_imagem']) && $_FILES['mapa_imagem']['error'] == 0) {
        
        // Definir o diretório de upload
        $diretorio = '../../Dashboard Do Admin/uploads/';
        
        // Obter o nome da imagem sem o caminho
        $nome_imagem = basename($_FILES['mapa_imagem']['name']);
        
        // Definir o caminho completo para onde a imagem será movida
        $caminho_imagem = $diretorio . $nome_imagem;
        
        // Movendo a imagem para o diretório de uploads
        if (move_uploaded_file($_FILES['mapa_imagem']['tmp_name'], $caminho_imagem)) {
            
            // Inserir apenas o nome da imagem no banco de dados
            $sql = "INSERT INTO mapas_mentais_manual (imagem) VALUES ('$nome_imagem')";
            
            if (mysqli_query($conn, $sql)) {
                echo "Mapa mental adicionado com sucesso!";
            } else {
                echo "Erro ao inserir no banco de dados: " . mysqli_error($conn);
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Nenhuma imagem foi enviada.";
    }
} else {
    echo "Requisição inválida.";
}

// Fechar a conexão
mysqli_close($conn);
?>
