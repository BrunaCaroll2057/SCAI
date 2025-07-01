<?php

session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo para validar e recuperar dados do token
include_once 'validar_token.php';

// Chamar a função validar o token, se a função retornar FALSE significa que o token é inválido e acessa o IF
if(!validarToken()){
    // Criar a mensagem de erro e atribuir para variável global
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    // Redireciona o o usuário para o arquivo index.php
    header("Location: index_login.php");

    // Pausar o processamento da página
    exit();
}

// Chamar a função para recuperar o nome salvo no token
echo "Bem vindo " . recuperarNomeToken() . ". <br>";

// Chamar a função para recuperar o e-mail salvo no token
echo "E-mail do usuário logado " . recuperarEmailToken() . ". <br>";

// Link para sair e apagar cookie token
echo "<a href='logout.php'>Sair</a><br>";