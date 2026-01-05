<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Busca o admin pelo nome 
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        // Verifica se a senha inserida é válida
        if (password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: ../Dashboard Do Admin/dashboard_admin.php');
            exit;
        } else {
            $error_message = "Senha incorreta!";
        }
    } else {
        $error_message = "Usuário não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompassTCC - A Melhor plataforma de TCC</title>
    <link rel="shortcut icon" href="./favicon.png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="icon-title">
            <i class="fas fa-user-shield"></i> <!-- Ícone de usuário admin -->
        </div>
        <?php if (isset($error_message)) { echo "<p class='error-message'>$error_message</p>"; } ?>
        <form method="POST">
            <label for="username">Usuário:</label>
            <input type="text" name="username" required><br>

            <label for="password">Senha:</label>
            <input type="password" name="password" required><br>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

