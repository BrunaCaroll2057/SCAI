<?php
session_start();
include 'processologin/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
};

include __DIR__ . '/processologin/config.php'; // conexão com o banco

// Busca todos os usuários
$sql = "SELECT * FROM user_form ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body class="bg-light">
<?php
include __DIR__ . '/Includes/menuinclude.php';
?>

<div class="container mt-5">
    <h2 class="mb-4" id="tit_sobre">Usuários Cadastrados</h2>
    <br>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Aprovado?</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['tipo'] ?></td>
                <td><?= $row['aprovado'] == 1 ? 'Sim' : 'Não' ?></td>

                <td>
                    <a href="ver_usuario.php?id=<?= $row['id'] ?>" 
                       class="btn btn-info btn-sm">Ver</a>

                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['id'] ?>)">
                        Excluir
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Deletar usuário?",
        text: "Essa ação não pode ser desfeita.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, deletar",
        cancelButtonText: "Cancelar", // <--- aqui você muda
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        customClass: {
            confirmButton: 'swal2-confirm btn btn-danger',
            cancelButton: 'swal2-cancel btn btn-secondary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "delete_user.php?id=" + id;
        }
    });
}
</script>

<br>

<?php
  include "Includes/rodapeinclude.php";
?>

</body>
</html>