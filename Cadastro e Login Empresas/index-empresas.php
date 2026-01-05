<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompassTCC - A Melhor plataforma de TCC</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="./favicon.png">
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <div class="form-toggle">
                <button id="login-toggle" class="active" onclick="toggleForm('login')">Login</button>
                <button id="signup-toggle" onclick="toggleForm('signup')">Cadastro</button>
            </div>
            <form id="login-form" method="post" action="login-empresas.php">
                <h2>Login para Empresas</h2>
                <input type="email" name="email" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" name="senha" placeholder="Senha" id="login-password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('login-password')">👁️</span>
                </div>
                <button type="submit" name="login_btn">Entrar</button>
                <?php if (isset($_GET['login_error'])) { ?>
                    <p class="error-message"><?php echo $_GET['login_error']; ?></p>
                <?php } ?>
            </form>
            <form id="signup-form" method="post" action="register-empresas.php" style="display: none;">
                <h2>Cadastro para Empresas</h2>
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Email" required>
                <div class="password-container">
                    <input type="password" name="senha" placeholder="Senha" id="signup-password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('signup-password')">👁️</span>
                </div>
                <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
                <button type="submit" name="register_btn">Cadastrar</button>
                <?php if (isset($_GET['register_error'])) { ?>
                    <p class="error-message"><?php echo $_GET['register_error']; ?></p>
                <?php } ?>
            </form>

        
        </div>
    </div>

    

    <script src="./js/script.js"></script>
</body>
</html>
