<?php
// Inicie a sessão
session_start();

// Conexão com o banco de dados
require_once 'db_connect.php';

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $descricao = $_POST['descricao'];
    $link = $_POST['link'];

    // Processamento do upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmp = $_FILES['imagem']['tmp_name'];
        $imagemNome = $_FILES['imagem']['name'];
        $imagemDir = '../../Dashboard Do Admin/uploads/' . $imagemNome; // Diretório onde a imagem será salva

        // Move a imagem para o diretório desejado
        if (move_uploaded_file($imagemTmp, $imagemDir)) {
            // Inserir dados no banco de dados
            $sql = "INSERT INTO videos_multimidia (titulo, subtitulo, descricao, link, caminho_imagem) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'sssss', $titulo, $subtitulo, $descricao, $link, $imagemDir);
            
            if (mysqli_stmt_execute($stmt)) {
                // Redirecionamento com JavaScript
                echo "<script>
                        alert('Vídeo adicionado com sucesso!');
                        window.location.href = 'index.php?msg=video_adicionado';
                      </script>";
                exit;
            } else {
                // Trate o erro de inserção aqui
                echo "Erro ao adicionar vídeo: " . mysqli_error($conn);
            }
        } else {
            echo "Erro ao mover a imagem.";
        }
    } else {
        echo "Erro no upload da imagem.";
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
