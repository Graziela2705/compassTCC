<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../Bloqueio-Admin/login_admin.php');
    exit;
}
require 'db_connect.php';

// Verifica se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $acesso_concedido = $_POST['acesso_concedido'] ? 1 : 0;

    // Atualiza a empresa no banco de dados
    $sql = "UPDATE empresas SET nome = ?, email = ?, acesso_concedido = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nome, $email, $acesso_concedido, $id);

    if ($stmt->execute()) {
        echo "Empresa atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar a empresa.";
    }

    // Redireciona de volta para gerenciar empresas (você pode querer passar uma mensagem de sucesso)
    header('Location: dashboard_admin.php');
    exit;
}
