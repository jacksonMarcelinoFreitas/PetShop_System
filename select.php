<?php

    require_once("./connection.php");

    function selectAllCliente(){
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }
    
        $sql = "SELECT * FROM CLIENTE";
        $stmt = $connection->query($sql);
        $stmt->execute();

        $connection -> close();

        return $stmt;
    };

    function selectCliente(){
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $sql = "SELECT * FROM CLIENTE WHERE id=$id";
            $stmt = $connection->query($sql);
            $stmt->execute();

            $connection -> close();

            return $stmt;
        };
    };

?>