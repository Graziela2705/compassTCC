<?php
$servername = "localhost";
$username = "root"; // seu nome de usuário do banco de dados
$password = ""; // sua senha do banco de dados
$dbname = "compasstcc"; // seu nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>