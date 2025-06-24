<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="../css/estilo.css">

    <title>Login</title>
</head>
<body>
    <?php
        include '../menuinclude.php';
    ?>

    <h1 id="tit_principal_pagina">Login</h1>

    <form action="login2.php" method="post">
            <div>
                <input type="text" nome="username" id="username" placeholder="Digite seu nome de usuário" required>
            </div>
        <br>
            <div>
                <input type="email" nome="email" id="email" placeholder="Digite seu e-mail" required>
            </div>
        <br>
            <div>
                <input type="password" nome="password" id="password" placeholder="Digite sua senha" required>
            </div>
        <br>
            <input type="submit" value="Logar">
        <br><br>
        <p>Não possui conta cadastrada ainda? Cadastre-se <a href="cadastro.php">AQUI</a></p>
    </form>

    <?php
        include "../rodapeinclude.php"
    ?> 
</body>
</html>