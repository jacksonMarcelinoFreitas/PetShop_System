<?php

    if(isset($_GET['action'])){
        $id = $_GET['id'];
        if($_GET['action'] == 1){
            header("location: cliente.php?id=$id&update=true");
        }else if($_GET['action'] == 2){
            header("location: cliente.php?id=$id&delete=true");
        }
    }

    require_once("./connection.php");

    function selectAllCliente(){
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM CLIENTE";
        $stmt = $connection->query($sql);
        // $stmt->execute();

        $connection -> close();

        return $stmt;
    };

    function selectCliente($id) {
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if($id){

            $sql = "SELECT * FROM CLIENTE WHERE id=$id";
            $stmt = $connection->query($sql);

            if ($stmt === false) {
                die("Erro na consulta: " . $connection->error);
            }
        }
        else{
            die("Erro problemas com o id do cliente " . $connection->connect_error);
        }
        $connection->close();

        return $stmt;
    }

?>