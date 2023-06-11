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
    }

    require_once("./connection.php");

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

?>