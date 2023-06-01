


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
        <section class="container-form">
            <form action="validarUsuario.php?tela=1" method="post" id="form" name="form">
                <div class="box-form">
                    <h1>Informe o login para entrar!</h1>
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
                    <Button name="form" type="submit">Enviar</Button>
                </div>
                <div class="box-form last">
                   <span>Não é registrado? Faça o <a href="telaLogup.php">Cadastro !</a></span>
                </div>
            </form>
        </section>
        <div class="container-background">
        </div>
    </div>
</body>
</html>