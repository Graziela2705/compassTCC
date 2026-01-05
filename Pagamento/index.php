<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pagamento</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Página de Pagamento</h1>
        </header>

        <!-- Detalhes do Cronograma -->
        <section class="payment-details">
            <div class="payment-card">
                
                <!-- Formulário de pagamento -->
                <form action="process_payment.php" method="POST" class="payment-form">
                    <!-- Ícones dos métodos de pagamento -->
                    <div class="payment-icons">
                        <img src="img/card1.png" alt="Visa" class="payment-icon">
                        <img src="img/card2.png" alt="MasterCard" class="payment-icon">
                        <img src="img/card3.png" alt="American Express" class="payment-icon">
                        <img src="img/card1.png" alt="Boleto" class="payment-icon">
                    </div>

                    <!-- Número do Cartão -->
                    <div class="form-group">
                        <label for="card-number">Número do Cartão</label>
                        <input type="text" id="card-number" name="card-number" placeholder="Digite somente números" required aria-label="Número do cartão">
                    </div>

                    <!-- Nome Impresso no Cartão -->
                    <div class="form-group">
                        <label for="card-name">Nome Impresso no Cartão</label>
                        <input type="text" id="card-name" name="card-name" placeholder="Digite o nome impresso no cartão" required aria-label="Nome impresso no cartão">
                    </div>

                    <!-- Data de Validade -->
                    <div class="form-group">
                        <label for="expiry-date">Validade</label>
                        <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/AA" required aria-label="Data de validade">
                    </div>

                    <!-- Código de Segurança (CVV) -->
                    <div class="form-group">
                        <label for="cvv">Código de Segurança (CVV)</label>
                        <input type="text" id="cvv" name="cvv" placeholder="Digite o CVV" required aria-label="Código de segurança (CVV)">
                    </div>

                    <!-- Opção de Parcelamento -->
                    <div class="form-group">
                        <label for="installments">Parcelamento</label>
                        <select id="installments" name="installments" aria-label="Escolha o parcelamento">
                            <option value="1">1x de R$ 97,00</option>
                            <option value="2">2x de R$ 48,50</option>
                            <option value="3">3x de R$ 32,33</option>
                        </select>
                    </div>

                    <!-- Botão de Enviar -->
                    <div class="form-group">
                        <button type="submit" class="btn-pay">Comprar Agora</button>
                    </div>
                </form>
            </div>
        </section>

        <footer class="footer">
            <p>&copy; 2024 Cronogramas. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>
