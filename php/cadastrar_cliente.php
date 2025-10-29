<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../cadastro_cliente.html');
    exit;
}

$nome = $conn->real_escape_string($_POST['nome']);
$email = $conn->real_escape_string($_POST['email']);
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$endereco = $conn->real_escape_string($_POST['endereco']);
$telefone = $conn->real_escape_string($_POST['telefone']);

$stmt = $conn->prepare("INSERT INTO usuario (nome,email,senha,nivel_acesso) VALUES (?,?,?,'cliente')");
$stmt->bind_param('sss',$nome,$email,$senha);
$stmt->execute();
$id_usuario = $conn->insert_id;

$stmt2 = $conn->prepare("INSERT INTO cliente (id_usuario,endereco,telefone) VALUES (?,?,?)");
$stmt2->bind_param('iss',$id_usuario,$endereco,$telefone);
$stmt2->execute();

echo 'Cliente cadastrado com sucesso. <a href="../index.html">Voltar</a>';
?>