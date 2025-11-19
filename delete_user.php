<?php
session_start();
include 'processologin/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
};

include __DIR__ . '/processologin/config.php'; // conexão com o banco

$id = $_GET['id'];

// impede excluir o admin
if ($id == 6) {
    die("<script>alert('O administrador principal não pode ser excluído.'); window.location='listar_usuarios.php';</script>");
}

$sql = "DELETE FROM user_form WHERE id = $id";

if ($conn->query($sql)) {
    echo "<script>
        alert('Usuário excluído com sucesso!');
        window.location='listar_usuarios.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao excluir usuário.');
        window.location='listar_usuarios.php';
    </script>";
}
?>