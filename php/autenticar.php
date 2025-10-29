<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.html');
    exit;
}

$email = $conn->real_escape_string($_POST['email']);
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
    $u = $res->fetch_assoc();
    if (password_verify($senha, $u['senha'])) {
        $_SESSION['usuario'] = $u;
        header('Location: ../dashboard.html');
        exit;
    } else {
        echo 'Senha incorreta.';
    }
} else {
    echo 'Usuário não encontrado.';
}
?>