<?php

session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo com a conexão com banco de dados
include_once 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
</head>
<body>

    <?php
    include 'Includes/menuinclude.php';

    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);    

    // Acessa o IF quando o usuário clicar no botão cadastrar
    if(!empty($dados['SendCadUser'])){
        //var_dump($dados);

        // Criar a QUERY para cadastrar no banco de dados
        $query_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (:nome, :email, :usuario, :senha)";

        // Preparar a QUERY
        $cad_usuario = $conn->prepare($query_usuario);

        // Substituir o link pelo valor que vem do formulário
        $cad_usuario->bindParam(':nome', $dados['nome']);
        $cad_usuario->bindParam(':email', $dados['email']);
        $cad_usuario->bindParam(':usuario', $dados['email']);
        
        // Criptografar a senha
        $senha_criptografada = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $cad_usuario->bindParam(':senha', $senha_criptografada);

        // Executar a QUERY
        $cad_usuario->execute();

        // Acessa o IF quando cadastrar o registro no banco de dados
        if($cad_usuario->rowCount()){
            // Criar a mensagem e atribuir para variável global
            $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";

            // Redirecionar o usuário para a página de login
            header("Location: index_login.php");
        }else{
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        }
    }

    ?>

    <br><br>
    <h1 id="tit_cadastrar">Cadastrar</h1>

    <!-- Início do formulário cadastrar usuário -->
    <form method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo"><br><br>
        
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Seu melhor e-mail"><br><br>
        
        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Senha com mínimo 6 caracteres"><br><br>

        <input type="submit" name="SendCadUser" value="Cadastrar"><br><br>
    </form>
    <!-- Fim do formulário cadastrar usuário -->

    <a href="index_login.php">Login</a><br>
    
    <?php
        echo "<p style= 'margin-top: 7.5%'></p>";
        include "Includes/rodapeinclude.php";
    ?>

</body>
</html>