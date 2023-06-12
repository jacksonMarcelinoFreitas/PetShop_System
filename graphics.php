<?php
  require_once('./connection.php');
  try {
        // Estabeleça a conexão usando a extensão PDO
        $conn = connection();

        $cargo = "Vendedor";
        $sql = "SELECT COUNT(*) AS total_funcionarios FROM funcionario WHERE cargoFuncionario = :cargo";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':cargo' => $cargo));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalFuncionarios = $row['total_funcionarios'];

        $cargo1 = "Atendente"; 
        $sql = "SELECT COUNT(*) AS totalOutrosFuncionarios FROM funcionario WHERE cargoFuncionario = :cargo";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':cargo' => $cargo1));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalOutrosFuncionarios = $row['totalOutrosFuncionarios'];

        //SecondGraphic - Pie Chart
        $sql = "SELECT nomeServico, COUNT(*) AS total FROM clienteservico
            INNER JOIN servico ON fk_servico_idServico = idServico
            GROUP BY fk_servico_idServico
            ORDER BY total DESC
            LIMIT 7";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $donutData = [
            'labels' => [],
            'datasets' => [
                [
                    'data' => [],
                    'backgroundColor' => [],
                ]
            ]
        ];

        foreach ($result as $row) {
            $nome = $row['nomeServico'];
            $total = $row['total'];

            $donutData['labels'][] = $nome;
            $donutData['datasets'][0]['data'][] = $total;
            $donutData['datasets'][0]['backgroundColor'][] = '#' . substr(md5(rand()), 0, 6); // Cor aleatória
        }

        $donutOptions = [
            'maintainAspectRatio' => false,
            'responsive' => true,
        ];
        // Third Chart
        $sql = "SELECT nomeProduto, valorProduto FROM produto";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $nomes = [];
        $precos = [];

        foreach ($result as $row) {
            $nomes[] = $row['nomeProduto'];
            $precos[] = $row['valorProduto'];
        }

        //Fourth Chart
        // $sql = "SELECT valorTotal, fk_cliente_cpfCliente FROM compra";
        // $stmt = $conn->prepare($sql);
        // $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $valores = [];
        // $cpfs = [];

        // foreach ($result as $row) {
        //     $valores[] = $row['valorTotal'];
        //     $cpfs[] = $row['fk_cliente_cpfCliente'];
        // }
        $sql = "SELECT valorTotal, nomeCliente FROM compra JOIN cliente ON idCliente = fk_cliente_idCliente";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $valores = [];
        $nomesCliente = [];

        foreach ($result as $row) {
            $valores[] = $row['valorTotal'];
            $nomesCliente[] = $row['nomeCliente'];
        }

    } catch(PDOException $e) {
        echo "Falha na conexão: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Shop | Graficos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./src/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./src/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <span class="brand-text font-weight-light">PET SHOP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul> 
          <li class="nav-item menu-open">
              <a href="chartjs.html" class="nav-link active">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>Graficos</p>
              </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Valores das Compras dos nosso Clientes</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Quantidade de Funcionários:</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
              <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Serviços mais Pedidos do Pet Shop</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Produtos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 300px; height: 290px; max-height: 250px; max-width: 180%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./src/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./src/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="./src/dist/js/adminlte.min.js"></script>

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
            labels: ['<?php echo $cargo; ?>', 'Atendente'],
            datasets: [
                {
                    data: [<?php echo $totalFuncionarios; ?>, <?php echo $totalOutrosFuncionarios; ?>],
                    backgroundColor: ['#f56954', '#00a65a'],
                }
            ]
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