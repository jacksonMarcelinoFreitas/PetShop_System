<?php
  require_once("./verificarSessao.php");
  require_once("./graphics.php");
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
                        <li class="nav-item">
                            <a href="./dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Graficos
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
      </div>

<!-- jQuery -->
<script src="src/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="src/plugins/chart.js/Chart.min.js"></script>
<!-- src App -->
<script src="src/dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
    var valores = <?php echo json_encode($valores); ?>;
    var nomesCliente = <?php echo json_encode($nomesCliente); ?>;

    var areaData = {
        labels: nomesCliente,
        datasets: [
            {
                label: 'Valor da Compra',
                data: valores,
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Cor de fundo da área
                borderColor: 'rgba(75, 192, 192, 1)', // Cor da borda da área
                borderWidth: 1 // Largura da borda da área
            }
        ]
    };

    var areaOptions = {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    new Chart(areaChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
    });
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // Use a quantidade de funcionários para criar o gráfico usando Chart.js
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
        var donutData00 = {
          labels: <?php echo json_encode($labels); ?>,
          datasets: [{
              data: <?php echo json_encode($data); ?>,
              backgroundColor: <?php echo json_encode($backgroundColor); ?>
          }]
        };
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        };

        // Crie o gráfico de rosquinha (donut)
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData00,
            options: donutOptions
        });

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var donutData = <?php echo json_encode($donutData); ?>;
    var donutOptions00 = <?php echo json_encode($donutOptions); ?>;

    new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions00
    });

    //---------------------
    //- BAR CHART -
    //---------------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var nomes = <?php echo json_encode($nomes); ?>;
    var precos = <?php echo json_encode($precos); ?>;

    var barData = {
        labels: nomes,
        datasets: [
            {
                label: 'Preço',
                data: precos,
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Cor de fundo das barras
                borderColor: 'rgba(54, 162, 235, 1)', // Cor da borda das barras
                borderWidth: 1 // Largura da borda das barras
            }
        ]
    };

    var barOptions = {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    new Chart(barChartCanvas, {
        type: 'bar',
        data: barData,
        options: barOptions
    });
  })
</script>
</body>
</html>