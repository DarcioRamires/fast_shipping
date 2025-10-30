<?php
$host = 'localhost'; $user = 'root'; $pass = ''; $dbname = 'fast_shipping'; $port = 3306;
try { $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); }
catch (PDOException $e) { die('Erro na conexão: ' . $e->getMessage()); }
?>