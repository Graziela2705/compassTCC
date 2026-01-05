<?php
// Defina o caminho para o arquivo do cronograma
$cronogramaFile = '../Cronogramas/uploads/crono2.xlsx';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulação de pagamento (aqui você pode adicionar validações extras se desejar)
    $cardNumber = $_POST['card-number'];
    $cardName = $_POST['card-name'];
    $expiryDate = $_POST['expiry-date'];
    $cvv = $_POST['cvv'];
    $installments = $_POST['installments'];

    // Simula um pagamento com sucesso
    $paymentSuccess = true; // Simulação de sucesso (você pode adicionar lógica para falhar em certas condições)

    // Se o pagamento foi bem-sucedido, redireciona para a página de sucesso
    if ($paymentSuccess) {
        // Redireciona para a página de sucesso
        header('Location: payment_success.php');
        exit;
    } else {
        // Caso contrário, mostra uma mensagem de erro
        echo 'Erro no pagamento. Tente novamente.';
    }
}
?>
