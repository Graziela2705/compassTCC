<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../Bloqueio-Admin/login_admin.php'); // Ajuste o caminho se necessário
    exit;
}

require 'db_connect.php'; // Ajuste o caminho se necessário

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_empresa'])) {
    $id_empresa = intval($_POST['id_empresa']);

    // Atualiza a coluna 'acesso_concedido' para true
    $sql = "UPDATE empresas SET acesso_concedido = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_empresa);

    if ($stmt->execute()) {
        // Redireciona de volta para o dashboard admin com o parâmetro para carregar empresas
        header('Location: dashboard_admin.php?pagina=gerenciar_empresas.php');
    } else {
        echo "Erro ao conceder acesso.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método inválido ou ID da empresa não fornecido.";
}
?>
