<?php
    require_once("./connection.php");

    function updateCliente(){

        $connection = connection();

        if (isset($_POST['form'])) {

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];

            $id = trim($connection->real_escape_string($id));
            $nome = trim($connection->real_escape_string($nome));
            $cpf = trim($connection->real_escape_string($cpf));
            $telefone = trim($connection->real_escape_string($telefone));

            $sql = "UPDATE CLIENTE SET nomeCliente = ?, cpfCliente = ?, telefoneCliente = ? WHERE id = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('sssi', $nome, $cpf, $telefone, $id);
            $stmt->execute();

            header("Location: cliente.php?id=$id&update=true");
        }
    }

    updateCliente();
?>