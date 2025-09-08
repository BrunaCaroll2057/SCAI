<?php
$hash = 'COLE_AQUI_O_HASH_DO_BANCO';
$senha_teste = 'Admin123!'; // a senha que você quer testar

if (password_verify($senha_teste, $hash)) {
    echo "Senha correta!";
} else {
    echo "Senha incorreta!";
}
?>
