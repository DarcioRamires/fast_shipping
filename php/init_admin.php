<?php
// Run this once to hash the admin password and update the database.
// Usage: upload to server and run via browser or CLI.
include 'conexao.php';
$plain = '123456';
$hash = password_hash($plain, PASSWORD_DEFAULT);
$sql = "UPDATE usuario SET senha = '$hash' WHERE email = 'admin@fastshipping.com'";
if ($conn->query($sql) === TRUE) {
    echo "Admin initialized. Email: admin@fastshipping.com  Password: 123456 (hashed)";
} else {
    echo "Erro: " . $conn->error;
}
?>