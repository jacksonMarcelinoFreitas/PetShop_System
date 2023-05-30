<?php 

    require_once('./connection.php');

    $connection = connection();

    if($_GET['tela'] == 1) {
        validarLogin($connection);
    }else if($_GET['tela'] == 2){
        cadastrarUsuario($connection);
    }

    function validarLogin($connection){

        //verifica se possui todos os parâmetros 
        if(isset($_POST['form'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
        }else{
            header('Location: telaLogin.php?erroLogin=1');
        }

        try{
            $sql = $connection->prepare("SELECT * FROM usuario WHERE email = :email and senha = :senha");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute(); 

            if($sql->rowCount() > 0){
                header('Location: index.php');
                exit;
            }else{
                header('Location: telaLogin.php?erroLogin=2');
                exit;
            }
        }catch(Exception $e){
            echo 'Erro ao encontar usuário:', $e->getMessage();
            header('Location: telaLogin.php?erro=2');
            exit;
        }
    }

    function cadastrarUsuario($connection){
        try{
            if(isset($_POST['form'])){
                $nome = $_POST['nome'];
                $senha = md5($_POST['senha']);
                $email = $_POST['email'];
                $administrador = $_POST['administrador'];
            }else{
                header('Location: telaLogup.php?erroCadastro=1');
            }

        // Insert
        $sql = "INSERT INTO usuario (nome, email, senha, administrador) VALUES (:nome,:email,:senha,:administrador)";
        
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':nome',$nome);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':senha',$senha);
        $stmt->bindValue(':administrador',$administrador);
        $stmt->execute();

        header('Location: home.php?logado=2');

        }catch(Exception $e){
            echo 'Erro ao enviar:', $e->getMessage();
            // header('Location: telaLogup.php?erroCadastro=2');
        }

        return 0;
    }

?>
