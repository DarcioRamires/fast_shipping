<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../cadastro_veiculo.html');
    exit;
}

$placa = $conn->real_escape_string($_POST['placa']);
$marca = $conn->real_escape_string($_POST['marca']);
$modelo = $conn->real_escape_string($_POST['modelo']);
$capacidade = !empty($_POST['capacidade']) ? floatval($_POST['capacidade']) : NULL;

$stmt = $conn->prepare("INSERT INTO veiculo (placa,marca,modelo,capacidade) VALUES (?,?,?,?)");
$stmt->bind_param('sssd',$placa,$marca,$modelo,$capacidade);
$stmt->execute();

echo 'Veículo cadastrado com sucesso. <a href="../dashboard.html">Voltar</a>';
?>