<?php
session_start();
include 'compasstcc.php';

// Limpe qualquer sessão existente para evitar conflitos
session_unset();
session_destroy();

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_empresa = "SELECT * FROM empresas WHERE email = '$email'";
    $result_empresa = mysqli_query($conn, $sql_empresa);

    if (mysqli_num_rows($result_empresa) == 1) {
        $row = mysqli_fetch_assoc($result_empresa);
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['empresa_nome'] = $row['nome'];
            $_SESSION['empresa_email'] = $row['email'];
            header("Location: ../Conteúdos/Boas Vindas/index.php");
            exit();
        } else {
            header("Location: index-empresas.php?login_error=Senha incorreta.");
            exit();
        }
    } else {
        header("Location: index-empresas.php?login_error=Empresa não encontrada.");
        exit();
    }
}
?>
