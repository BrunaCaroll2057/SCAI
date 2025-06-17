<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <script src="JS/js.js"></script>
    <link rel="stylesheet" href="css/estilo.css">

</head>
<body>
    <?php
        include 'menuinclude2.php'
    ?>
    <br><br><br>

    <h1>Atualizar Informações de cadastro</h1>

    <form>
<fieldset>
    <div>
      <input class="input1" type="text" nome="nome" id="nome" placeholder="Nome de usuário">
    </div>
  
<br>
    <div>
      <input class="input2" type="text" nome="email" id="email" placeholder="E-mail">
    </div>
  <br>
    <div>
      <input class="input2" type="date" name="dtnascimento" id="dtnascimento" placeholder="Data de Nascimento">
    </div>
<br>
    <div>
      <input class="input2" type="tel" name="telefone" id="telefone" placeholder="Telefone">
    </div>
<br>
    <div>
      <input class="input2" type="text" name="cpf" id="cpf" placeholder="CPF">
    </div>
<br>
    <div>
  <select class="input2" name="time">
    <option value="UF">UF</option>
    <option value="AC">Acre</option>
    <option value="RR">Roraima</option>
    <option value="RO">Rondônia</option>
    <option value="AM">Amazonas</option>
    <option value="PA">Pará</option>
    <option value="AP">Amapá</option>
    <option value="TO">Tocantins</option>
    <option value="GO">Goiás</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="DF">Distrito Federal</option>
    <option value="MA">Maranhão</option>
    <option value="BA">Bahia</option>
    <option value="PI">Piauí</option>
    <option value="AL">Alagoas</option>
    <option value="PB">Paraíba</option>
    <option value="PE">Pernambuco</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="SE">Sergipe</option>
    <option value="CE">Ceará</option>
    <option value="ES">Espírito Santo</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="SP">São Paulo</option>
    <option value="MG">Minas Gerais</option>
    <option value="PR">Paraná</option>
    <option value="SC">Santa Catarina</option>
    <option value="RS">Rio Grande do Sul</option>
  </select>
    </div>
<br>
    <div>
      <input class="input2" type="number" name="cidade" placeholder="Cidade">
    </div> 
<br>
    <div>
      <input class="input2" type="password" name="senha" id="senha" placeholder="Senha">
    </div>
<br>
  <button type="submit" class="input2" class="button"><a href="perfil.php" style="color: black;">Atualizar</button></a>
</fieldset>
</form>

<?php
  include "rodapeinclude.php"
?>
</body>
</html>