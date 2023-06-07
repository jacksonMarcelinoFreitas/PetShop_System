<?php

    require_once("./connection.php");

    function updateCliente() {
        
        $connection = connection();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM cliente WHERE id=$id";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                $nome = $row['nomeCliente'];
                $cpf = $row['cpfCliente'];
                $telefone = $row['telefoneCliente'];
            }

            header('Location: cliente.php?id=1');
        }

        return $result;
    }
?>