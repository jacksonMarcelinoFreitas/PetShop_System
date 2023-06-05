<?php
    // $message = $_GET['message'];
    // if(isset($_GET['message'])){
    //     if($message == 1){
    //         echo "Não foi possível adicionar";
    //     }else if($message == 2){
    //         echo "Não foi possível adicionar";
    //     }else if($message == 3){
    //         echo "Não foi possível adicionar";
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=fallback">
    <link rel="stylesheet" href="./styles/cliente.css">
    <script src="https://kit.fontawesome.com/b4415bb129.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/dist/css/adminlte.min.css">
    <link href="src/plugins/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet">
    <script src="src/plugins/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet"></script>
    <script src="src/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <title>AdminLTE 3 | Top Navigation + Sidebar</title>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <!-- Main Sidebar Container -->
    <div class="wrapper">

        <!-- Navbar -->
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
                        <li class="nav-item">
                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                <i class="fas fa-th-large"></i>
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
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./src/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
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
                            <a href="./src/cliente.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-person"></i>
                                <p>
                                    Clientes
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./src/usuario.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-user"></i>
                                <p>
                                    Usuários
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./src/produto.php" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-cart-shopping"></i>
                                <p>
                                    Produtos
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./src/compra.php" class="nav-link">
                                <i class="nav-icon fas fa-duotone fa-bag-shopping"></i>
                                <p>
                                    Compras
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./src/servico.php" class="nav-link">
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

        <div class="box-container">

            <div class="box-side">
                <h1>Adicionar Cliente</h1>
                <form action="insert.php" method="post" id="form" name="form">
                    <input type="hidden" name="id">

                    <div class="form-box">
                        <label for="nome">Nome Completo:</label>
                        <input type="text" id="nome" name="nome" placeholder="Jhon Doe" required >
                    </div>

                    <div class="form-box">
                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" placeholder="060.978.542-34" required >
                    </div>

                    <div class="form-box">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" placeholder="(19) 999456-7989)" required>
                    </div>

                    <input type="submit" name="form" value="Adicionar">
                </form>
            </div>

            <div class="box-side">
                <h1>Lista de Clientes</h1>
                <div class="container-table">
                  <table>
                      <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>João da Silva</td>
                              <td>123.456.789-00</td>
                              <td>(11) 98765-4321</td>
                              <td>
                                  <a href="#" class="edit-icon fa-solid fa-pen-to-square"></a>
                                  <a href="#" class="delete-icon fa-solid fa-trash-can"></a>
                              </td>
                          </tr>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer d-flex justify-content-end">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Ducão PetShop</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script>


$.toast({
  heading: 'Notificação',
  text: 'Esta é uma notificação de exemplo.',
  showHideTransition: 'slide',
  icon: 'info',
  position: 'top-right'
});

</script>

    <!-- jQuery -->
    <script src="./src/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./src/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./src/dist/js/demo.js"></script>





</body>

</html>