<?php
// Verifique se o parâmetro 'file' foi passado na URL
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // Defina o caminho completo do arquivo
    $filePath = 'uploads/' . $file;

    // Verifique se o arquivo existe
    if (file_exists($filePath)) {
        // Defina os cabeçalhos para download do arquivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($filePath));
        
        // Leia o arquivo e envie para o navegador
        readfile($filePath);
        exit;
    } else {
        echo 'Arquivo não encontrado.';
    }
} else {
    echo 'Arquivo não especificado.';
}
?>
