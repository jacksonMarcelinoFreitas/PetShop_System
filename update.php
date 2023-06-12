<?php
    require_once("./connection.php");

    if(isset($_POST['form'])){
        $id = $_GET['id'];
        //cliente
        if($_GET['tela'] == 1){
            updateCliente($id);
            header("location: cliente.php?update=true&message=1&id=$id");
        //produto
        }else if($_GET['tela'] == 2){
            updateProduto($id);
            header("location: produto.php?update=true&message=1&id=$id");
        //animal
        }else if($_GET['tela'] == 5){
            updateAnimal($id);
            header("location: animal.php?update=true&message=1&id=$id");
        }
    }

    function updateCliente($id){

        $connection = connection();

        try{
            if(isset($_POST['form'])){
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['telefone'];
            }else{
                header("Location: produto.php?update=true&message=3&id=$id");
            }

            $id = trim($connection->real_escape_string($id));
            $nome = trim($connection->real_escape_string($nome));
            $cpf = trim($connection->real_escape_string($cpf));
            $telefone = trim($connection->real_escape_string($telefone));

            $sql = "UPDATE CLIENTE SET nomeCliente = ?, cpfCliente = ?, telefoneCliente = ? WHERE id = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('sssi', $nome, $cpf, $telefone, $id);
            $stmt->execute();

        } catch (Exception $e) {
            header("Location: produto.php?update=true&message=2&id=$id");
        }
    }

    function updateProduto($id){

        $connection = connection();

        try{
            if(isset($_POST['form'])){
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $valor = $_POST['valor'];
                $descricao = $_POST['descricao'];
                $codigo = $_POST['codigo'];
            }else{
                header("Location: produto.php?update=true&message=3&id=$id");
            }

            $id = trim($connection->real_escape_string($id));
            $nome = trim($connection->real_escape_string($nome));
            $valor = trim($connection->real_escape_string($valor));
            $descricao = trim($connection->real_escape_string($descricao));
            $codigo = trim($connection->real_escape_string($codigo));

            $sql = "UPDATE PRODUTO SET nomeProduto = ?, valorProduto = ?, descricaoProduto = ?, codProduto = ?  WHERE idProduto = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('sdsii', $nome, $valor, $descricao, $codigo, $id);
            $stmt->execute();

        } catch (Exception $e) {
            header("Location: produto.php?update=true&message=2&id=$id");
        }
    }
    function updateAnimal($id){

        $connection = connection();

        try{
            if(isset($_POST['form'])){
                $idAnimal = $_POST['idAnimal'];
                $idCliente = $_POST['idCliente'];
                $nomeAnimal = $_POST['nomeAnimal'];

            }else{
                header("Location: animal.php?update=true&message=3&id=$id");
            }

            // $idAnimal = trim($connection->real_escape_string($idAnimal));
            // $idCliente = trim($connection->real_escape_string($idCliente));
            // $nomeAnimal = trim($connection->real_escape_string($nomeAnimal));

            $sql = "UPDATE ANIMAL SET nomeAnimal = ?, fk_idCliente = ? WHERE idAnimal = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param('sii', $nomeAnimal, $idCliente, $idAnimal);
            $stmt->execute();

            // var_dump($nomeAnimal, $idCliente, $idAnimal);

        } catch (Exception $e) {
            header("Location: animal.php?update=true&message=2&id=$id");
        }
    }

?>