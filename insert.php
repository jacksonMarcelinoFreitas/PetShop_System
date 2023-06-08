<?php

  require_once("./connection.php");

  function insert() {
    try {
      $connection = connection();

      if (isset($_POST['form'])) {

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        // Validação dos dados
        // Exemplo: remova espaços em branco extras e aplique a função mysqli_real_escape_string
        $nome = trim($connection->real_escape_string($nome));
        $cpf = trim($connection->real_escape_string($cpf));
        $telefone = trim($connection->real_escape_string($telefone));

        // Insert
        $sql = "INSERT INTO cliente (nomeCliente, cpfCliente, telefoneCliente) VALUES (?, ?, ?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param('sss', $nome, $cpf, $telefone);
        $stmt->execute();

        // Redirecionamento com mensagem de sucesso
        header('Location: cliente.php?message=1');
      } else {
        // Redirecionamento com mensagem de erro
        header('Location: cliente.php?message=2');
      }
    } catch (Exception $e) {
      // Armazenar mensagem de erro em uma variável de sessão
      // $_SESSION['error_message'] = 'Erro ao enviar: ' . $e->getMessage();
      // header('Location: cliente.php?message=3');
      echo "$connection->error";
    }
  }

  insert();
?>
