<?php
session_start();
include 'processologin/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
};

include __DIR__ . '/processologin/config.php'; // conexão com o banco
include __DIR__ . '/Includes/menuinclude.php';

$id = $_GET['id'];

$sql = "SELECT * FROM user_form WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Usuário não encontrado.");
}

$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SCAI - Visualizar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4>Dados do Usuário</h4>
        </div>

        <div class="card-body">

            <p><strong>ID:</strong> <?= $user['id'] ?></p>
            <p><strong>Nome:</strong> <?= $user['name'] ?></p>
            <p><strong>Email:</strong> <?= $user['email'] ?></p>
            <p><strong>Tipo de conta:</strong> <?= $user['tipo'] ?></p>
            <p><strong>Aprovado:</strong> <?= $user['aprovado'] == 1 ? 'Sim' : 'Não' ?></p>
            <p><strong>Imagem:</strong></p>
            <img src="uploaded_img/<?= $user['image'] ?>" width="150">

            <br><br>
            <a href="listar_usuarios.php" class="btn btn-secondary">Voltar</a>

        </div>
    </div>
</div>

</body>
</html>