<?php
   session_start();
    include 'processologin/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Buscar funcionários pendentes
$result = mysqli_query($conn, "SELECT id, name, email FROM user_form WHERE tipo = 'funcionario' AND aprovado = 0");

if (isset($_POST['aprovar'])) {
    $id = intval($_POST['id']);
    mysqli_query($conn, "UPDATE user_form SET aprovado = 1 WHERE id = $id");
    header('Location: aprovacoes.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <h2>Pedidos de Cadastro de Funcionários Pendentes</h2>

    <?php
        if (mysqli_num_rows($result) > 0): 
    ?>

        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>

            <?php 
                while ($row = mysqli_fetch_assoc($result)): 
            ?>
            
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="aprovar">Aprovar</button>
                        </form>
                    </td>
                </tr>

    <?php
        endwhile; 
    ?>

        </table>

    <?php 
        else: 
    ?>

        <p>Não há pedidos pendentes.</p>

    <?php 
        endif; 
    ?>

</body>
</html>
