<?php
    include './connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./styles/logIn.css">
    <title>LogIn</title>
</head>
<body>
    <div class="container">
        <div class="container-background">

        </div>
        <section class="container-form">
            <form action="validarUsuario.php?tela=2" method="post" id="form" name="form">
                <div class="box-form">
                    <h1>Registre-se para entrar!</h1>
                </div>
                <div class="box-form">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" placeholder="Jhon Doe">
                </div>
                <div class="box-form">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="email@gmail.com">
                </div>
                <div class="box-form">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="JhonDoe123">
                </div>

                <div class="box-form">

                    <div class="box-option">
                        <label>Administrador ?</label>
                        <div class="box-radio">
                            <label for="sim">Sim</label>
                            <input type="radio" name="administrador" id="sim" value="1">
                        </div>
                        <div class="box-radio">
                            <label for="nao">Não</label>
                            <input type="radio" name="administrador" id="nao" value="0" checked>
                        </div>
                    </div>

                </div>

                <div class="box-form">
                    <Button name="form" type="submit">Enviar</Button>
                </div>
                <div class="box-form last">
                   <span>Já é registrado? Faça o <a href="telaLogin.php">Login !</a></span>
                </div>
            </form>
        </section>
    </div>
</body>
</html>