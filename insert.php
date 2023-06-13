<?php

  require_once("./connection.php");

  if(isset($_GET ['tela'])){
    if($_GET ['tela'] == 1){
      insertCliente();
    }else if($_GET['tela'] == 2){
      insertImagem();
    }

  }

  function insertCliente() {
    try {
      $connection = connection();

      if (isset($_POST['form'])) {

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        $nome = trim($connection->real_escape_string($nome));
        $cpf = trim($connection->real_escape_string($cpf));
        $telefone = trim($connection->real_escape_string($telefone));

        $sql = "INSERT INTO cliente (nomeCliente, cpfCliente, telefoneCliente) VALUES (?, ?, ?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param('sss', $nome, $cpf, $telefone);
        $stmt->execute();

        header('Location: cliente.php?message=1');
      } else {
        header('Location: cliente.php?message=2');
      }
    } catch (Exception $e) {
      echo "$connection->error";
    }
  }


  function insertImagem(){
    try {
      $connection = connection();

      if (isset($_POST['form'])) {
        $id = $_POST['id'];

        if($_FILES['imagem']['name']){

          move_uploaded_file($_FILES['imagem']['tmp_name'], "src/imagens/imagens_usuarios/".$_FILES['imagem']['name']);
          $img = "src/imagens/imagens_usuarios/".$_FILES['imagem']['name'];

        }
        else{
            $img = "./src/imagens/image_default.png";
        }
      }else{
        header('Location: perfilUsuario.php?message=1');
      }

      $sql = "UPDATE usuario SET avatarUsuario = ? WHERE idUsuario = $id";


      $stmt = $connection->prepare($sql);
      $stmt->bind_param('s', $img);
      $stmt->execute();

      echo "Imagem enviada com sucesso!";
      header('Location: perfilUsuario.php?message=2');

    } catch (Exception $e) {
      echo "$connection->error";
      header('Location: perfilUsuario.php?message=3');
    }

  }

?>
