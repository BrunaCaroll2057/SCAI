<?php
session_start();
include 'processologin/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
};

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
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body class="bg-light">

<?php 
    include __DIR__ . '/Includes/menuinclude.php'; 
?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4>Dados do Usuário</h4>
        </div>

        <div class="card-body">
            <div class="user-card">
                <div class="user-image">
                    <?php 
                    $imagePath = !empty($user['image']) && file_exists('processologin/uploaded_img/'.$user['image']) 
                        ? 'processologin/uploaded_img/'.$user['image'] 
                        : 'processologin/uploaded_img/default-user.png';
                    ?>
                    <img src="<?= $imagePath ?>" alt="Imagem do Usuário">
                </div>

                <div class="user-details">
                    <p><strong>ID:</strong> <?= $user['id'] ?></p>
                    <p><strong>Nome:</strong> <?= $user['name'] ?></p>
                    <p><strong>Email:</strong> <?= $user['email'] ?></p>
                    <p><strong>Tipo de conta:</strong> <?= $user['tipo'] ?></p>
                    <p><strong>Aprovado:</strong> <?= $user['aprovado'] == 1 ? 'Sim' : 'Não' ?></p>
                    <a href="listar_usuarios.php" class="btn btn-secondary mt-3">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include "Includes/rodapeinclude.php"; 
?>

</body>
</html>