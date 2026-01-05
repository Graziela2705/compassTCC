<?php
// Verificar se o arquivo existe
$cronogramaFile = '../Cronogramas/uploads/crono2.xlsx';
if (!file_exists($cronogramaFile)) {
    echo 'Cronograma não encontrado.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Concluído</title>
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }
        .header h1 {
            color: #28a745; /* Verde para sucesso */
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .payment-success {
            margin-top: 20px;
        }
        .payment-success p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
        }
        .btn-download {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-download:hover {
            background-color: #218838;
        }
        .footer {
            margin-top: 40px;
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Pagamento Realizado com Sucesso!</h1>
        </header>

        <section class="payment-success">
            <p>Seu pagamento foi processado com sucesso! Agora você pode baixar o cronograma.</p>
            <a href="<?php echo $cronogramaFile; ?>" download class="btn-download">Baixar Cronograma</a>
        </section>

        <footer class="footer">
            <p>&copy; 2024 Cronogramas. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>
