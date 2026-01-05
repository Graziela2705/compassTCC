<?php
include 'db_connect.php'; // Inclua a conexão com o banco de dados

// Defina o nome de usuário e a senha do admin
$username = 'admin'; // Mude se necessário
$password = '38180048Ab%'; // Mude para a senha desejada

// Criptografa a senha antes de inseri-la
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Query para inserir o admin no banco de dados
$query = "INSERT INTO admin (username, password_hash) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $username, $password_hash);

// Executa a query e verifica o sucesso
if ($stmt->execute()) {
    echo "Admin inserido com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
