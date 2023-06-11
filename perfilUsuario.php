
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
  <script src="https://kit.fontawesome.com/b4415bb129.js" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    * {
      font-family: 'Source Sans Pro', sans-serif;
    }

    body, html{
      height: 100%;
      width: 100%;
      padding: 0;
      margin: 0;
    }

    .container, .wrapper, form {
      display: flex;
      align-items: center;
      justify-content: center;

      width: 100%;
      height: 100%;
    }

    .wrapper{
      position: relative;
      height: 70%;
      max-width: 30%;
      background-color: gray;
      border-radius: 12px;

      flex-direction: column;
    }

    form{
      flex-direction: column;
    }

    form span{
      margin: 16px 0px;
    }

    form p{
      font-size: 20px;
    }

    h1{
      font-weight: 900;
      font-size: 32px;
    }

    /* Esconde o input */
    input[type='file'] {
      display: none
    }

    /* Aparência que terá o seletor de arquivo */
    label, input[type="submit"] {
      background-color: #3498db;
      border-radius: 5px;
      color: #fff;
      cursor: pointer;
      /* margin: 10px; */
      padding: 12px 24px;
      border: none;
      font-size: 16px;
    }

    .box-form{
      display: flex;
      flex-direction: column;
      gap: 4px;
    }


    .profile{
      height: 120px;
      width: 120px;
      border: 4px solid #3498db;
      border-radius: 50%;

      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    a{
      position: absolute;
      font-size: 28px;
      color: white;
      right: 20px;
      top: 20px
    }

  </style>
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
      <a href="./cliente.php?"><i class="fa-regular fa-circle-xmark"></i></a>
      <form action="./insert.php?tela=2" name="form" method="POST" enctype="multipart/form-data">
        <h1>Perfil</h1>
        <div class="profile" style="background-image: url('<?php echo $rowUsuario["avatarUsuario"] ?>');" >
        </div>
        <p><?php echo $rowUsuario["nomeUsuario"] ?></p>
        <span>Trocar foto?</span>
        <div class="box-form">
          <label for='imagem'>Selecionar um arquivo &#187;</label>
          <input id='id' type='hidden' name="id" value="<?php echo $_SESSION['idUsuario']?>">
          <input id='imagem' type='file' name="imagem">
          <input type="submit" name="form">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
