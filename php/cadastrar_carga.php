<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../cadastro_carga.html');
    exit;
}

$origem = $conn->real_escape_string($_POST['origem']);
$destino = $conn->real_escape_string($_POST['destino']);
$peso = !empty($_POST['peso']) ? floatval($_POST['peso']) : NULL;
$dimensoes = $conn->real_escape_string($_POST['dimensoes']);
$data_envio = !empty($_POST['data_envio']) ? $_POST['data_envio'] : NULL;
$data_entrega = !empty($_POST['data_entrega']) ? $_POST['data_entrega'] : NULL;
$id_cliente = intval($_POST['id_cliente']);
$id_motorista = !empty($_POST['id_motorista']) ? intval($_POST['id_motorista']) : NULL;

$stmt = $conn->prepare("INSERT INTO carga (origem,destino,peso,dimensoes,status,data_envio,data_entrega,id_cliente,id_motorista) VALUES (?,?,?,?, 'pendente',?,?,?,?)");
$stmt->bind_param('ssdsissii',$origem,$destino,$peso,$dimensoes,$data_envio,$data_entrega,$id_cliente,$id_motorista);
$stmt->execute();

echo 'Carga cadastrada com sucesso. <a href="../dashboard.html">Voltar</a>';
?>