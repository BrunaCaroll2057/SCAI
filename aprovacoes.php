<?php
session_start();
include 'processologin/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
};

// Buscar funcionários pendentes
$result = mysqli_query($conn, "SELECT id, name, email FROM user_form WHERE tipo = 'funcionario' AND aprovado = 0");

if (isset($_POST['aprovar'])) {
    $id = intval($_POST['id']);
    mysqli_query($conn, "UPDATE user_form SET aprovado = 1 WHERE id = $id");
    header('Location: aprovacoes.php');
    exit;
}

if (isset($_POST['rejeitar'])) {
    $id = intval($_POST['id']);
    // Exemplo: deletar o usuário rejeitado
    mysqli_query($conn, "DELETE FROM user_form WHERE id = $id");
    header('Location: aprovacoes.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* altura mínima da tela */
            background-color: #f8f9fa;
        }

        main {
            flex: 1; /* faz o main crescer para ocupar o espaço disponível */
        }

    </style>
</head>
<body>
    <?php include __DIR__ . '/Includes/menuinclude.php'; ?>

    <main class="container my-5">
        <h2 class="mb-4 text-center" id="tit_sobre">Pedidos de Cadastro de Funcionários Pendentes</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td class="text-center">
                                    <form method="post" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                        <button type="submit" name="aprovar" class="btn btn-success btn-sm me-2" title="Aprovar Funcionário">
                                            <i class="fa fa-check me-1" aria-hidden="true"></i> Aprovar
                                        </button>
                                        <button type="submit" name="rejeitar" class="btn btn-danger btn-sm" title="Rejeitar Funcionário" onclick="return confirm('Tem certeza que deseja rejeitar este pedido?');">
                                            <i class="fa fa-times me-1" aria-hidden="true"></i> Rejeitar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                Não há pedidos pendentes no momento.
            </div>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <?php include "Includes/rodapeinclude.php"; ?>
</body>
</html>