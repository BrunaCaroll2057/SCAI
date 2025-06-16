<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="css/estilo.css">
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>

</head>
<body>
    <?php
        include 'menuinclude.php'
    ?>
  
<h1 id="sobre">Cadastro</h1>

    <form>
<fieldset>
    <div>
      <input id="input1" type="text" nome="nome" id="nome" placeholder="Nome de usuário">
    </div>
  
<br>
    <div>
      <input id="input2" type="text" nome="email" id="email" placeholder="E-mail">
    </div>
  <br>
    <div>
      <input id="input2" type="number" name="dtnascimento" id="dtnascimento" placeholder="Data de Nascimento">
    </div>
<br>
    <div>
      <input id="input2" type="number" name="telefone" id="telefone" placeholder="Telefone">
    </div>
<br>
    <div>
      <input id="input2" type="text" name="cpf" id="cpf" placeholder="CPF">
    </div>
<br>
    <div>
  <select id="input2" name="time">
    <option value="uf">UF</option>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>

  </select>
    </div>
<br>
    <div>
      <input id="input2" type="number" name="casa" placeholder="N° da casa">
    </div> 
<br>
    <div>
      <input id="input2" type="password" name="senha" id="senha" placeholder="Senha">
    </div>
<br>
  <button type="submit" class="button"><a href="login.php" style="color: black;">Cadastrar</button></a>
</fieldset>
</form>

</body>
</html>