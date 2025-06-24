<?php

    include "cnx.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(strlen($password) < 6 || strlen($password) > 16)
    {
        echo "Senha comprida ou pequena demais!";
        echo "<a href='login.php'>Tentar novamente</a>";
        die;
    }

    if(strlen($username) > 24 || strlen($username) < 3)
    {
        echo "Nome de usuário comprido ou pequeno demais!";
        echo "<a href='login.php'>Tentar novamente</a>";
        die;
    }

    if(strlen($email) > 64 || strlen($email) < 12)
    {
        echo "Email comprido ou pequeno demais!";
        echo "<a href='login.php'>Tentar novamente</a>";
        die;
    }

    if(strpos($email, "@") == -1)
    {
        echo "Email inválido.";
        echo "<a href='login.php'>Tentar novamente</a>";
        die;
    }

?>