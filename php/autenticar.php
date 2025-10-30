<?php
require 'config.php'; session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: ../index.html'); exit; }
$email = $_POST['email'] ?? ''; $senha = $_POST['senha'] ?? '';
$stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ? LIMIT 1'); $stmt->execute([$email]); $u = $stmt->fetch(PDO::FETCH_ASSOC);
if ($u && password_verify($senha, $u['senha'])) { $_SESSION['usuario'] = $u; header('Location: ../dashboard.html'); exit; } else { echo 'Credenciais inválidas.'; }
?>