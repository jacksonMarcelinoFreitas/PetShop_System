<?php

    require_once('./connection.php');
    session_start();


    // if($_GET['tela'] == 1) {
    //     validarLogin();
    // }else if($_GET['tela'] == 2){
    //     cadastrarUsuario();
    // }

    function cadastrarUsuario(){

        $connection = connection();

            try{
                if(isset($_POST['form'])){
                    $nome = $_POST['nome'];
                    $senha = $_POST['senha'];
                    $email = $_POST['email'];
                    $administrador = $_POST['administrador'];

                    $nome = trim($connection->real_escape_string($nome));
                    $senha = trim($connection->real_escape_string($senha));
                    $email = trim($connection->real_escape_string($email));
                    $administrador = trim($connection->real_escape_string($administrador));

                }else{
                    $connection->close();
                    header('Location: telaLogup.php?registered=false');
                }

                $sql = "INSERT INTO usuario (nome, email, senha, administrador) VALUES (?, ?, ?, ?)";

                $stmt = $connection->prepare($sql);
                $stmt->bind_param('sssb', $nome, $email, $senha, $administrador);
                $stmt->execute();

                $connection->close();
                header('Location: telaLogin.php?registered=true');

            }catch(Exception $e){
                $connection->close();
                echo 'Erro ao enviar:', $e->getMessage();
                header('Location: telaLogup.php?registered=false&error=1');
            }

        }

    function validarLogin(){

        $connection = connection();


        try{

            if(isset($_POST['form'])){
                $email = $_POST['email'];
                $senha = $_POST['senha'];
            }else{
                $connection->close();
                header('Location: telaLogin.php?loged=false&error=1');
            }

            $sql = "SELECT * FROM usuario WHERE email = ? and senha = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param('ss', $email, $senha);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if($row > 0){

                $_SESSION['usuario_id'] = $row['usuario_id'];

                $connection->close();
                header('Location: index.php?loged=true');
                exit;
            }
            else{
                $connection->close();
                header('Location: telaLogin.php?loged=false');
                exit;
            }

        }catch(Exception $e){
            $connection->close();
            echo 'Erro ao encontar usuário:', $e->getMessage();
            header('Location: telaLogin.php?loged=false&error=2');
            exit;
        }

    }

    validarLogin();

?>
