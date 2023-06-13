
<?php
    require_once("./verificarSessao.php");
    require_once("./select.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=fallback">
  <link rel="stylesheet" href="./styles/perfil.css">
  <script src="https://kit.fontawesome.com/b4415bb129.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <?php
    $resultUsuario = selectUsuario($_SESSION['idUsuario']);
    $rowUsuario = $resultUsuario->fetch_assoc();

    //Faz o limite de palavras
    $palavras = explode(" ", $rowUsuario["nomeUsuario"]);
    $primeirasPalavras = array_slice($palavras, 0, 2);
    $nomeUser = implode(" ", $primeirasPalavras);
  ?>
  <div class="container">
    <div class="wrapper">
      <a href="./cliente.php?"><i class="fa-regular fa-circle-xmark icon-close"></i></a>
      <form action="./insert.php?tela=2" name="form" method="POST" enctype="multipart/form-data">
        <h1>Perfil</h1>
        <div class="profile" style="background-image: url('<?php echo $rowUsuario["avatarUsuario"] ?>');" >
        </div>
        <p><?php echo $rowUsuario["nomeUsuario"] ?></p>
        <span>Trocar foto?</span>
        <div class="box-form">
          <label for='imagem'>Selecionar um arquivo <i class="fa-solid fa-upload"></i></label>
          <input id='id' type='hidden' name="id" value="<?php echo $_SESSION['idUsuario']?>">
          <input id='imagem' type='file' name="imagem">
          <input type="submit" name="form">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
