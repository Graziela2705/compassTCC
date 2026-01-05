<?php
include 'compasstcc.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Validar os dados (pode adicionar mais validações conforme necessário)
    if ($senha != $confirmar_senha) {
        header("Location: index-empresas.php?register_error=As senhas não coincidem.");
        exit();
    }

    // Verifica se o email já está cadastrado
    $stmt = $conn->prepare("SELECT * FROM empresas WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: index-empresas.php?register_error=Email já está em uso.");
        exit();
    }

    // Criptografa a senha antes de salvar no banco
    $senha_segura = password_hash($senha, PASSWORD_DEFAULT);

    // Insere a empresa no banco de dados de forma segura
    $stmt = $conn->prepare("INSERT INTO empresas (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha_segura);
    if ($stmt->execute()) {
        header("Location: login-empresas.php");
        exit();
    } else {
        header("Location: index-empresas.php?register_error=Erro ao cadastrar empresa.");
        exit();
    }
} else {
    // Redirecionamento para página de registro se o método não for POST
    header("Location: index-empresas.php");
    exit();
}
?>
