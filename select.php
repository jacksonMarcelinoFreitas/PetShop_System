<?php

    require_once("./connection.php");

    function selectCliente(){

        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }
    
        $sql = "SELECT * FROM CLIENTE";
        $stmt = $connection->query($sql);
        // $stmt->execute();

        return $stmt;
    }

    function selectUsuario(){

        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }
    
        $sql = "SELECT * FROM USUARIO";
        $stmt = $connection->query($sql);
        // $stmt->execute();

        return $stmt;
    }
?>