<?php
    require_once("./connection.php");

    function deleteCliente(){

        $connection = connection();

        if (isset($_POST['form'])) {

            $id = $_GET['id'];
            // $nome = $_POST['nome'];
            // $cpf = $_POST['cpf'];
            // $telefone = $_POST['telefone'];

            $sql = "DELETE FROM CLIENTE WHERE id = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
        }

        header("Location: cliente.php?insert=true");
    }

    deleteCliente();
?>