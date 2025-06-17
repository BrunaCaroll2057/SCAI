<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="css/estilo.css">

</head>
<body>
    <?php
        include 'menuinclude.php'
    ?>

<h1 id="sobre">Login</h1>

<form>
<fieldset>
    <div>
      <input id="input1" type="text" nome="nome" id="nome" placeholder="E-mail/nome de usuário">
    </div>
  
<br>
    <div>
      <input id="input2" type="password" nome="senha" id="senha" placeholder="Senha">
    </div>
  <br>
    <button type="submit" class="button"><a href="principallogada.php" style="color: black;">Logar</button></a>
</fieldset>
</form>

<br>
<a href="cadastro.php" h6 class="sans serif" style="text-align: center; color: rgb(80, 94, 71);">Esqueceu sua senha?</h6></a>


<?php
  include "rodapeinclude.php"
?>
</body>
</html>