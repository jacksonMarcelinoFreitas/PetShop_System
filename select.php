<?php

    if(isset($_GET['action'])){
        $id = $_GET['id'];
        //cliente
        if($_GET['action'] == 1 && $_GET['tela'] == 1){
            header("location: cliente.php?update=true&id=$id");
        }else if($_GET['action'] == 2 && $_GET['tela'] == 1){
            header("location: cliente.php?delete=true&id=$id");

        //produto
        }else if($_GET['action'] == 1 && $_GET['tela'] == 2){
            header("location: produto.php?update=true&id=$id");
        }else if($_GET['action'] == 2 && $_GET['tela'] == 2){
            header("location: produto.php?delete=true&id=$id");
        }

        //animal
        else if($_GET['action'] == 1 && $_GET['tela'] == 5){
            header("location: animal.php?update=true&id=$id");
        }else if($_GET['action'] == 2 && $_GET['tela'] == 5){
            header("location: animal.php?delete=true&id=$id");
        }
    }

    require_once("./connection.php");

    function selectUsuario($id) {
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if($id){

            $sql = "SELECT * FROM USUARIO WHERE idUsuario=$id";
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

    function selectAllCliente(){
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM CLIENTE";
        $stmt = $connection->query($sql);

        $connection -> close();

        return $stmt;
    };

    function selectCliente($id) {
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if($id){

            $sql = "SELECT * FROM CLIENTE WHERE idCliente=$id";
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

    function selectProduto($id) {
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if($id){

            $sql = "SELECT * FROM PRODUTO WHERE idProduto=$id";
            $stmt = $connection->query($sql);

            if ($stmt === false) {
                die("Erro na consulta: " . $connection->error);
            }
        }
        else{
            die("Erro problemas com o id do produto " . $connection->connect_error);
        }
        $connection->close();

        return $stmt;
    }

    function selectAllProduto(){
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM PRODUTO";
        $stmt = $connection->query($sql);

        $connection -> close();

        return $stmt;
    };

    function selectAnimal($id) {
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        if($id){

            $sql = "SELECT * FROM ANIMAL WHERE idAnimal=$id";
            $stmt = $connection->query($sql);

            if ($stmt === false) {
                die("Erro na consulta: " . $connection->error);
            }
        }
        else{
            die("Erro problemas com o id do animal " . $connection->connect_error);
        }
        $connection->close();

        return $stmt;
    }

    function selectAllAnimal(){
        $connection = connection();

        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        }

        $sql = "SELECT a.idAnimal, a.nomeAnimal, CONCAT(a.fk_idCliente, ' - ', c.nomeCliente) as idNomeCliente FROM ANIMAL a JOIN CLIENTE c ON a.fk_idCliente = c.idCliente";
        $stmt = $connection->query($sql);

        $connection -> close();

        return $stmt;
    };



?>