
<?php
    require_once("./verificarSessao.php");
    require_once("./select.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=fallback">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="./src/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="./styles/cliente.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b4415bb129.js" crossorigin="anonymous"></script>

        <title>Ducão - PetShop</title>
    </head>

<body class="hold-transition sidebar-mini sidebar-collapse">


    <!-- Main Sidebar Container -->
    <div class="wrapper">
      <?php
            $resultUsuario = selectUsuario($_SESSION['idUsuario']);
            $rowUsuario = $resultUsuario->fetch_assoc();

            //Faz o limite de palavras
            $palavras = explode(" ", $rowUsuario["nomeUsuario"]);
            $primeirasPalavras = array_slice($palavras, 0, 2);
            $nomeUser = implode(" ", $primeirasPalavras);
            ?>

        <!-- /.navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light nav-color">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars nav-link-color"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link nav-link-color">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link nav-link-color">Contato</a>
                </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-link-user" style="display: flex; align-items: center; flex-direction: row; gap: 8px">

                        <div style="display: flex; align-items: end; flex-direction: column; line-height:16px;">
                            <span  style="font-size: 14px; color:#FFC300;"><?php echo $nomeUser ?></span>
                            <a href="./verificarSessao.php?action=1" style="font-size: 12px; color: #FFD60A">Sair</a>
                        </div>

                        <a href="./perfilUsuario.php" style="display: flex; align-items: center; gap: 12px">
                            <div class="avatar" style="background-image: url('<?php echo $rowUsuario["avatarUsuario"] ?>')" >
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt nav-link-color"></i>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                        </a>
                    </li> -->
                </ul>
            </nav>
            <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 aside-color">
            <!-- Brand Logo -->
            <a href="./home.php" class="brand-link">
                <div style="
                    overflow: hidden;
                    background: url('./src/imagens/logo_ducao_circle.png');
                    background-position: center;
                    background-size: cover;
                    width: 33px;
                    height: 33px;"
                    class="brand-image img-circle elevation-3">
                </div>
                <span class="brand-text font-weight-light">Ducão Petshop</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <div
                            class="img-circle elevation-2"
                            alt="User Image"
                            style="
                            background-image: url('<?php echo $rowUsuario["avatarUsuario"] ?>');
                            overflow: hidden;
                            background-position: center;
                            background-size: cover;
                            width: 33px;
                            height: 33px;
                            border: 1px solid #FFC300">
                        </div>
                    </div>
                    <div class="info">
                        <a href="perfilUsuario.php" class="d-block"><?php echo $nomeUser ?></a>
                    </div>
                </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">GERENCIAR</li>
                    <li class="nav-item">
                        <a href="./cliente.php" class="nav-link">
                            <i class="nav-icon fas fa-duotone fa-person nav-link-color"></i>
                            <p>
                                Clientes
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./animal.php" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-paw nav-link-color"></i>
                            <p>
                                Animais
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./perfilUsuario.php" class="nav-link">
                            <i class="nav-icon fas fa-duotone fa-user nav-link-color"></i>
                            <p>
                                Usuários
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./produto.php" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-cart-shopping nav-link-color"></i>
                            <p>
                                Produtos
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./compra.php" class="nav-link">
                            <i class="nav-icon fas fa-duotone fa-bag-shopping nav-link-color"></i>
                            <p>
                                Compras
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./servico.php" class="nav-link">
                            <i class="nav-icon fas fa-duotone fa-bell-concierge nav-link-color"></i>
                            <p>
                                Serviços
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-chart-simple nav-link-color"></i>
                            <p>
                                Dashboards
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Main content -->
        <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                        <!-- Formulario and Table -->
                        <div class="box-container">
                            <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $result = selectServico($id);
                                    $row = $result->fetch_assoc();
                                }

                                if(isset($_GET['update'])) {
                            ?>
                                <div class="box-side">
                                    <h1>Atualizar Serviço</h1>
                                    <form action="update.php?tela=3&id=<?php echo $id ?>" name="form" method="post" id="form" >
                                        <input type="hidden" name="idServico" value="<?php echo $row["idServico"] ?>">

                                        <div class="form-box">
                                            <label for="nomeServico">Nome do serviço:</label>
                                            <input type="text" name="nomeServico" id="nomeServico" placeholder="Tosa e banho" value="<?= $row["nomeServico"] ?>" required>
                                        </div>

                                        <div class="form-box">
                                            <label for="valorServico">Preço:</label>
                                            <input type="text" name="valorServico" id="valorServico" placeholder="R$230,00" value="<?= $row["valorServico"] ?>" required>
                                        </div>

                                        <div class="form-button">
                                            <input type="submit" name="form" value="Atualizar" style="background-color: #FFC300; color: #000000;">
                                            <a class="voltar" href="./servico.php">Voltar</a>
                                        </div>
                                    </form>
                                </div>

                            <?php
                                }else if(isset($_GET['delete'])){
                            ?>
                                <div class="box-side">
                                    <h1>Excluir Serviço</h1>
                                    <form action="delete.php?tela=3&id=<?php echo $id ?>" name="form" method="post" id="form">
                                        <input type="hidden" name="id" value="<?php $row["idServico"] ?>">

                                        <div class="form-box">
                                            <label for="nomeServico">Nome do Serviço:</label>
                                            <input type="text" name="nomeServico" id="nomeServico" placeholder="Tosa e banho" disabled value="<?= $row["nomeServico"] ?>">
                                        </div>

                                        <div class="form-box">
                                            <label for="valorServico">Preço:</label>
                                            <input type="text" name="valorServico" id="valorServico" placeholder="R$230,00" disabled value="<?=  $row["valorServico"] ?>" >
                                        </div>

                                        <div class="form-button">
                                            <input type="submit" name="form" value="Excluir" style="background-color: #FFC300; color: #000000;">
                                            <a class="voltar" href="./servico.php">Voltar</a>
                                        </div>
                                    </form>
                                </div>
                            <?php
                                }else{
                            ?>
                                <div class="box-side">
                                    <h1>Cadastrar Serviço</h1>
                                    <form action="insert.php?tela=3" name="form" method="post" id="form">
                                        <div class="form-box">
                                            <label for="nomeServico">Nome do serviço:</label>
                                            <input type="text" name="nomeServico" id="nomeServico" placeholder="Tosa e banho" required>
                                        </div>

                                        <div class="form-box">
                                            <label for="valorServico">Preço:</label>
                                            <input type="text" name="valorServico" id="valorServico" placeholder="R$230,00" required>
                                        </div>

                                        <div class="form-button">
                                            <input type="submit" name="form" value="Cadastrar" style="background-color: #FFC300; color: #000000;">
                                        </div>
                                    </form>
                                </div>
                            <?php
                                }
                            ?>
                            <div class="box-side">
                                <h1>Lista de Serviços</h1>
                                <div class="container-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nome do serviço</th>
                                                <th>Preço</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $result = selectAllServico();
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
                                                    <td><?php echo $row["nomeServico"]; ?></td>
                                                    <td><?php echo $row["valorServico"]; ?></td>
                                                    <td>
                                                        <a href="select.php?tela=3&id=<?php echo $row["idServico"] ?>&action=1" class="edit-icon">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="select.php?tela=3&id=<?php echo $row["idServico"] ?>&action=2" class="delete-icon">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                                } else {

                                            ?>
                                                <tr>
                                                    <td colspan="4">Nenhum cliente encontrado.</td>
                                                </tr>
                                            <?php
                                                }
                                                endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Formulario and Table -->
                    </div>
                </div>
            </section>
            <!-- /.content -->


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
            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "1500",
                "extendedTimeOut": "2000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        </script>
        <?php
            if(isset($_GET['message'])){
                if ($_GET['message'] == 1) {
                    echo "<script>toastr.success('Sucesso !')</script>";
                }
                if ($_GET['message'] == 2) {
                    echo "<script>toastr.error('Erro !')</script>";
                }
                // if ($_GET['message'] == 3) {
                //     echo "<script>toastr.info('Texto')</script>";
                // }
                // if ($_GET['message'] == 4) {
                //     echo "<script>toastr.info('Texto')</script>";
                // }
            }
        ?>
    </body>
</html>