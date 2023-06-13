<?php
    require_once("./connection.php");

    if(isset($_POST['form'])){
        $id = $_GET['id'];

        //cliente
        if($_GET['tela'] == 1){
            deleteCliente($id);
            header("location: cliente.php?message=1");

        }else if($_GET['tela'] == 2){
            deleteProduto($id);
            header("location: produto.php?message=1");

        }else if($_GET['tela'] == 3){
            deleteServico($id);
            // header("location: servico.php?message=1");

        }else if($_GET['tela'] == 5){
            deleteAnimal($id);
            header("location: animal.php?message=1");
        }
    }

    function deleteCliente($id){

        $connection = connection();

        try{
            $sql = "DELETE FROM CLIENTE WHERE idCliente = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            header("Location: cliente.php?message=1");

        } catch (Exception $e) {
            header("Location: cliente.php?message=2");
        }

    };

    function deleteProduto($id){

        $connection = connection();

        try{
            $sql = "DELETE FROM PRODUTO WHERE idProduto = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            header("Location: produto.php?message=1");

        } catch (Exception $e) {
            header("Location: produto.php?message=2");
        }

    }

    function deleteAnimal($id){

        $connection = connection();

        try{
            $sql = "DELETE FROM ANIMAL WHERE idAnimal = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            header("Location: animal.php?message=1");

        } catch (Exception $e) {
            header("Location: animal.php?message=2");
        }

    }

    function deleteServico($id){

        $connection = connection();

        $connection->query("SET FOREIGN_KEY_CHECKS = 0");

        try{
            $sql = "DELETE FROM SERVICO WHERE idServico = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            header("Location: servico.php?message=1");

        } catch (Exception $e) {
            header("Location: servico.php?message=2");
        }

        $connection->query("SET FOREIGN_KEY_CHECKS = 1");


    }
?>