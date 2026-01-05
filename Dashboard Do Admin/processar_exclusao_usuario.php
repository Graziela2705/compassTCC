<?php
session_start();
include 'db_connect.php';

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
}
