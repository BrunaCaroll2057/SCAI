<?php
   include 'processologin/config.php';
   include 'processologin/User.class.php';

   session_start();

   if (!isset($_SESSION['user_id'])) {
      header('Location: login.php');
      exit;
   }

   $user = new User($conn);
   $user_id = $_SESSION['user_id'];

   if (isset($_POST['update_profile'])) {
      $name = $_POST['update_name'];
      $email = $_POST['update_email'];
      $old_pass = $_POST['old_pass'];
      $new_pass = $_POST['new_pass'];
      $confirm_pass = $_POST['confirm_pass'];
      $image = $_FILES['update_image'];

      $result = $user->updateProfile($user_id, $name, $email, $old_pass, $new_pass, $confirm_pass, $image);

      if ($result === true) {
         $message[] = 'Perfil atualizado com sucesso!';
      } else {
         $message = $result; // array de erros
      }
   }

   $fetch = $user->getUserById($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="processologin/css/estilo.css">

</head>
<body>

<?php
  include __DIR__ . '/Includes/menuinclude.php';
?>
   
<div class="update-profile" style="background-color: white; margin-top: 50px; margin-bottom: 20px;">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
         <h3>Atualizar Informações do registro</h3>
         <br>

      <?php
         if($fetch['image'] == ''){
            echo '<img src="processologin/images/default-avatar.png">';
         }else{
            echo '<img src="processologin/uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Nome de usuário :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>Email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>Atualize sua foto :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <span>Senha atual :</span>
            <input type="password" name="old_pass" placeholder="Digite a senha atual" class="box">
            <span>Nova senha :</span>
            <input type="password" name="new_pass" placeholder="Digite a nova senha" class="box">
            <span>Confirme a senha :</span>
            <input type="password" name="confirm_pass" placeholder="Confirme a nova senha" class="box">
         </div>
      </div>
      <input type="submit" value="Atualizar" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">Voltar</a>
   </form>

</div>

<?php
  include "Includes/rodapeinclude.php";
?>

</body>
</html>