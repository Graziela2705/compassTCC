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

    $sql_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_usuario = mysqli_query($conn, $sql_usuario);

    if (mysqli_num_rows($result_usuario) == 1) {
        $row = mysqli_fetch_assoc($result_usuario);
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            header('Location: ../Conteúdos/Boas Vindas/index.php');
            exit();
        } else {
            header("Location: index.php?login_error=Senha incorreta.");
            exit();
        }
    } else {
        header("Location: index.php?login_error=Usuário não encontrado.");
        exit();
    }
}
?>
