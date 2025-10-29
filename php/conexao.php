<?php
// leitura do .env no diretório raiz
$cfg = parse_ini_file(__DIR__ . '/../.env', true);
$host = $cfg['database']['host'] ?? 'localhost';
$user = $cfg['database']['user'] ?? 'root';
$pass = $cfg['database']['pass'] ?? '';
$db = $cfg['database']['dbname'] ?? 'fast_shipping';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>