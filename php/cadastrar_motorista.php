<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../cadastro_motorista.html');
    exit;
}

$nome = $conn->real_escape_string($_POST['nome']);
$email = $conn->real_escape_string($_POST['email']);
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$cnh = $conn->real_escape_string($_POST['cnh']);
$id_veiculo = !empty($_POST['id_veiculo']) ? intval($_POST['id_veiculo']) : NULL;

$stmt = $conn->prepare("INSERT INTO usuario (nome,email,senha,nivel_acesso) VALUES (?,?,?,'motorista')");
$stmt->bind_param('sss',$nome,$email,$senha);
$stmt->execute();
$id_usuario = $conn->insert_id;

$stmt2 = $conn->prepare("INSERT INTO motorista (id_usuario,cnh,id_veiculo) VALUES (?,?,?)");
$stmt2->bind_param('isi',$id_usuario,$cnh,$id_veiculo);
$stmt2->execute();

echo 'Motorista cadastrado com sucesso. <a href="../index.html">Voltar</a>';
?>