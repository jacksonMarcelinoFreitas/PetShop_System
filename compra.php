
<?php
    require_once("./verificarSessao.php");
    require_once("./select.php");
    require_once("./notificacoes.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=fallback">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- <link href="src/plugins/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./src/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./styles/cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="src/plugins/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet"></script>
    <script src="https://kit.fontawesome.com/b4415bb129.js" crossorigin="anonymous"></script>
    <script src="src/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

    <title>Ducão - PetShop</title>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">


    <!-- Main Sidebar Container -->
    <div class="wrapper">

        <!-- Navbar -->
        <?php
            if(isset($_GET['message'])){
                if ($_GET['message'] == 1) {
                    info("Texto");
                };

            }

            $resultUsuario = selectUsuario($_SESSION['idUsuario']);
            $rowUsuario = $resultUsuario->fetch_assoc();

            //Faz o limite de palavras
            $palavras = explode(" ", $rowUsuario["nomeUsuario"]);
            $primeirasPalavras = array_slice($palavras, 0, 2);
            $nomeUser = implode(" ", $primeirasPalavras);
        ?>
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="./src/index3.html" class="navbar-brand">
                    <img src="./src/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Ducão Petshop</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="./src/index3.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contato</a>
                        </li>
                    </ul>

                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item" style="display: flex; align-items: center; flex-direction: row; gap: 8px">
                            <div style="display: flex; align-items: end; flex-direction: column; line-height:16px;">
                                <span  style="font-size: 14px" ><?php echo $nomeUser ?></span>
                                <a href="./verificarSessao.php?action=1" style="font-size: 12px">Sair</a>
                            </div>
                            <a href="./perfilUsuario.php" style="display: flex; align-items: center; gap: 12px">
                                <div class="avatar" style="background-image: url('<?php echo $rowUsuario["avatarUsuario"] ?>')" >
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="./src/index3.html" class="brand-link">
                <img src="./src/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Ducão Petshop</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center justify-content-center">
                    <div class="avatar" style="background-image: url('<?php echo $rowUsuario["avatarUsuario"] ?>');">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $nomeUser ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-header">GERENCIAR</li>
                        <li class="nav-item">
                            <a href="./cliente.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-person"></i>
                                <p>
                                    Clientes
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./usuario.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-user"></i>
                                <p>
                                    Usuários
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./produto.php" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-cart-shopping"></i>
                                <p>
                                    Produtos
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./compra.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-bag-shopping"></i>
                                <p>
                                    Compras
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./servico.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-bell-concierge"></i>
                                <p>
                                    Serviços
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">EXAMPLES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Search
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./src/search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simple Search</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Main Sidebar Container -->

        <!-- Formulario and Table -->
        <div class="box-container">
            <?php

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $result = selectCompra($id);
                    $row = $result->fetch_assoc();
                }

                if(isset($_GET['update'])) {
            ?>
                <div class="box-side">
                    <h1>Atualizar Compra</h1>
                    <form action="update.php?tela=4&id=<?php echo $id ?>" name="form" method="post" id="form" >
                        <input type="hidden" name="id" value=" <?= $row["idCompra"] ?>">

                        <div class="form-box">
                            <label for="data">Data da Compra:</label>
                            <input type="text" id="data" name="data" placeholder="Y-m-d H:i:s" value=" <?= $row["dataCompra"] ?>">
                        </div>

                        <div class="form-box">
                            <label for="valor">Valor Total:</label>
                            <input type="text" id="valor" name="valor" placeholder="0,00" value=" <?= $row["valorTotal"] ?>" >
                        </div>

                        <div class="form-box">
                            <label for="idCliente">Cliente Escolhido:</label>
                            <select name="idCliente" id="idCliente" class="combo-box" required>
                                <?php
                                    $connection = connection();
                                    $sql = "SELECT idCliente, nomeCliente FROM cliente";
                                    $resultCliente = $connection->query($sql);
                                    $idSelecionado = $row["fk_idCliente"];

                                    if ($resultCliente->num_rows > 0) {
                                        while ($rowCliente = $resultCliente->fetch_assoc()) {
                                            $idCliente = $rowCliente['idCliente'];
                                            $nomeCliente = $rowCliente['nomeCliente'];

                                            // Verifica se o ID do cliente é igual ao ID selecionado
                                            $selected = ($idCliente == $idSelecionado) ? 'selected' : '';

                                            // Cria a opção com o atributo 'selected' se necessário
                                            echo "<option value=\"$idCliente\" $selected>$nomeCliente</option>";
                                        }
                                    } else {
                                        echo "<option value=\"\">Nenhum animal encontrado</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-box">
                            <label for="idProduto">Produto Comprado:</label>
                            <select name="idProduto" id="idProduto" class="combo-box" required>
                                <?php
                                    $connection = connection();
                                    $sql = "SELECT idProduto, nomeProduto, codProduto FROM produto";
                                    $resultProduto = $connection->query($sql);
                                    $idSelecionado = $row["fk_idProduto"];

                                    if ($resultProduto->num_rows > 0) {
                                        while ($rowProduto = $resultCliente->fetch_assoc()) {
                                            $idProduto = $rowProduto['idProduto'];
                                            $nomeProduto = $rowProduto['nomeProduto'];
                                            $codProduto = $rowProduto['codProduto'];

                                            // Verifica se o ID do cliente é igual ao ID selecionado
                                            $selected = ($idProduto == $idSelecionado) ? 'selected' : '';

                                            // Cria a opção com o atributo 'selected' se necessário
                                            echo "<option value=\"$codProduto\" $selected disabled>$nomeProduto</option>";
                                        }
                                    } else {
                                        echo "<option value=\"\">Nenhum produto encontrado</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <input type="submit" name="form" value="Atualizar" style="background-color: rgb(27, 118, 255); color: rgb(224, 240, 255);">
                        <a class="voltar" href="./compra.php">Voltar</a>
                    </form>
                </div>

            <?php
                }else if(isset($_GET['delete'])){
            ?>
                <div class="box-side">
                    <h1>Excluir Compra</h1>
                    <form action="delete.php?tela=4&id=<?php echo $id ?>" name="form" method="post" id="form">
                        <input type="hidden" name="id" value=" <?= $row["idCompra"]; ?>">

                        <div class="form-box">
                            <label for="data">Data da Compra:</label>
                            <input type="text" id="data" name="data" placeholder="Y-m-d H:i:s" disabled value=" <?= $row["dataCompra"]; ?>">
                        </div>

                        <div class="form-box">
                            <label for="valor">Valor Total:</label>
                            <input type="text" id="valor" name="valor" placeholder="0,00" disabled value=" <?= $row["valorTotal"]; ?>" >
                        </div>

                        <div class="form-box">
                            <label for="idCliente">Cliente Escolhido:</label>
                            <select name="idCliente" id="idCliente" class="combo-box" required>
                                <?php
                                    $connection = connection();
                                    $sql = "SELECT idCliente, nomeCliente FROM cliente";
                                    $resultCliente = $connection->query($sql);
                                    $idSelecionado = $row["fk_idCliente"];

                                    if ($resultCliente->num_rows > 0) {
                                        while ($rowCliente = $resultCliente->fetch_assoc()) {
                                            $idCliente = $rowCliente['idCliente'];
                                            $nomeCliente = $rowCliente['nomeCliente'];

                                            // Verifica se o ID do cliente é igual ao ID selecionado
                                            $selected = ($idCliente == $idSelecionado) ? 'selected' : '';

                                            // Cria a opção com o atributo 'selected' se necessário
                                            echo "<option value=\"$idCliente\" $selected disabled>$nomeCliente</option>";
                                        }
                                    } else {
                                        echo "<option value=\"\">Nenhum cliente encontrado</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-box">
                            <label for="idCompra">Produto Comprado:</label>
                            <select name="idCompra" id="idCompra" class="combo-box" required>
                                <?php
                                    $connection = connection();
                                    $sql = "SELECT idProduto, nomeProduto, codProduto FROM produto";
                                    $resultProduto = $connection->query($sql);
                                    $idSelecionado = $row["fk_idProduto"];

                                    if ($resultProduto->num_rows > 0) {
                                        while ($rowProduto= $resultProduto->fetch_assoc()) {
                                            $idProduto = $rowProduto['idProduto'];
                                            $nomeProduto = $rowProduto['nomeProduto'];
                                            $codProduto = $rowProduto['codProduto'];

                                            // Verifica se o ID do cliente é igual ao ID selecionado
                                            $selected = ($idProduto == $idSelecionado) ? 'selected' : '';

                                            // Cria a opção com o atributo 'selected' se necessário
                                            echo "<option value=\"$codProduto\" $selected disabled>$nomeProduto</option>";
                                        }
                                    } else {
                                        echo "<option value=\"\">Nenhum produto encontrado</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <input type="submit" name="form" value="Excluir" style="background-color: rgb(224, 58, 58); color: rgb(255, 202, 202);">
                        <a class="voltar" href="./compra.php">Voltar</a>
                    </form>
                </div>
            <?php
                }else{
            ?>
                <div class="box-side">
                    <h1>Cadastrar Compra</h1>
                    <form action="insert.php?tela=4" method="post" id="form" name="form">
                        <!-- <input type="hidden" name="id"> -->

                        <div class="form-box">
                            <label for="data">Data da Compra:</label>
                            <input type="text" id="data" name="data" placeholder="Y-m-d H:i:s" >
                        </div>

                        <div class="form-box">
                            <label for="valor">Valor Total:</label>
                            <input type="text" id="valor" name="valor" placeholder="0,00" required>
                        </div>

                        <div class="form-box">
                            <label for="idCliente">Escolher o Cliente:</label>
                            <?php
                                $connection = connection();

                                $sql = "SELECT nomeCliente, idCliente FROM cliente";
                                $resultCliente = $connection->query($sql);

                                if ($resultCliente->num_rows > 0) {
                            ?>
                                    <select name="idCliente" id="idCliente" class="combo-box">
                                        <?php
                                            while ($row = $resultCliente->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['idCliente'] ?>"> <?php echo $row['nomeCliente'] ?> </option>
                                        <?php } ?>
                                    </select>
                                        <?php
                                } else {
                                    echo "Nenhum cliente encontrado.";
                                }; ?>
                        </div>
                        <div class="form-box">
                            <label for="idProduto">Escolher o Produto:</label>
                            <?php
                                $connection = connection();

                                $sql = "SELECT nomeProduto, codProduto FROM cliente";
                                $resultCliente = $connection->query($sql);

                                if ($resultCliente->num_rows > 0) {
                            ?>
                                    <select name="idProduto" id="idProduto" class="combo-box">
                                        <?php
                                            while ($row = $resultCliente->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['codProduto'] ?>"> <?php echo $row['nomeProduto'] ?> </option>
                                        <?php } ?>
                                    </select>
                                        <?php
                                } else {
                                    echo "Nenhum cliente encontrado.";
                                }; ?>
                        </div>

                        <input type="submit" name="form" value="Cadastrar" style="background-color: rgb(177, 255, 177); color: rgb(58, 99, 58); ">
                    </form>
                </div>
            <?php
                }
            ?>

            <div class="box-side">
                <h1>Lista de Compras</h1>
                <div class="container-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Data da Compra</th>
                                <th>Valor Total</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                // include("./select.php");
                                $result = selectAllCompra();

                                if (isset($error_message)) :
                            ?>

                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                                    </td>
                                </tr>

                            <?php else :

                                if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr>
                                    <td><?php echo $row["dataCompra"]; ?></td>
                                    <td><?php echo $row["valorTotal"]; ?></td>
                                    <td>
                                        <!-- <a href="#" class="edit-icon fa-solid fa-pen-to-square"></a> -->
                                        <!-- <a href="#" class="delete-icon fa-solid fa-trash-can"></a> -->
                                        
                                        <a href="compra.php?tela=4&id=<?php echo $row["idCompra"]?>&action=1" class="edit-icon">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="compra.php?tela=4&id=<?php echo $row["idCompra"]?>&action=2" class="delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php

                                }

                                } else {

                            ?>
                                    <tr>
                                        <td colspan="4">Nenhuma compra encontrado.</td>
                                    </tr>
                            <?php

                                }
                                endif;

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>



            <!-- Control Sidebar -->
            <!-- <aside class="control-sidebar control-sidebar-dark"> -->
                <!-- Control sidebar content goes here -->
            <!-- </aside> -->
            <!-- /.control-sidebar -->

        </div>
        <!-- Formulario and Table -->

        <!-- Footer -->
        <!-- <footer class="main-footer d-flex justify-content-start">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Ducão PetShop</a>.</strong> All rights
            reserved.
        </footer> -->
        <!-- Footer -->

        <!-- Scripts-->
        <!-- Bootstrap CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- jQuery -->
        <script src="./src/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="./src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="./src/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="./src/dist/js/demo.js"></script>

        <!-- Plugin Toastr -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>

                // toastr.options = {
                //     "closeButton": true,
                //     "debug": false,
                //     "newestOnTop": false,
                //     "progressBar": true,
                //     "positionClass": "toast-top-right",
                //     "preventDuplicates": false,
                //     "onclick": null,
                //     "showDuration": "60000",
                //     "hideDuration": "60000",
                //     "timeOut": "60000",
                //     "extendedTimeOut": "1000",
                //     "showEasing": "swing",
                //     "hideEasing": "linear",
                //     "showMethod": "fadeIn",
                //     "hideMethod": "fadeOut"
                // };

                // toastr.info("Mensagem aqui");

        </script>
</body>

</html>