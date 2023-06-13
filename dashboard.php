<?php
  require_once('./connection.php');
  require_once("./verificarSessao.php");
  require_once("./select.php");
  try {
        $connection = connection();

        //DONUT GRÁFICO - QUANTIDADE DE FUNCIONARIOS x CARGOS
        $sql = "SELECT COUNT(cargoFuncionario) as somaPorFuncionarios, cargoFuncionario as cargosListados FROM funcionario GROUP BY cargoFuncionario";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $cargosListados = [];
        $somaPorFuncionarios = [];

        // foreach ($result as $row) {
        //     $cargosListados[] = $row['cargosListados'];
        //     $somaPorFuncionarios[] = $row['somaPorFuncionarios'];
        // }

        //ESTRUTURA E PREENCHE OS DADOS PARA O GRAFICO DE DONUTS
        $donutData1 = [
          'labels' => [],
          'datasets' => [
              [
                  'data' => [],
                  'backgroundColor' => [],
              ]
            ]
        ];

        $donutOptions1 = [
          'maintainAspectRatio' => false,
          'responsive' => true,
        ];

      //ESTRUTURA E PREENCHE OS DADOS PARA O GRAFICO DE DONUTS
        foreach ($result as $row) {
            $cargosListados = $row['cargosListados'];
            $somaPorFuncionarios = $row['somaPorFuncionarios'];

            $donutData1['labels'][] = $cargosListados;
            $donutData1['datasets'][0]['data'][] = $somaPorFuncionarios;
            $donutData1['datasets'][0]['backgroundColor'][] = '#' . substr(md5(rand()), 0, 6); // Cor aleatória
        }


        // DONUT GRAFICO - SERVICOS X QUANTIDADE DE CONTRATACOES
        $sql = "SELECT a.nomeServico, COUNT(*) AS totalPorServico FROM clienteservico b
        INNER JOIN servico a ON b.fk_servico_idServico = a.idServico GROUP BY b.fk_servico_idServico
        ORDER BY totalPorServico DESC;";

        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $services = $result->fetch_all(MYSQLI_ASSOC);

        //ESTRUTURA E PREENCHE OS DADOS PARA O GRAFICO DE DONUTS
        $donutData = [
            'labels' => [],
            'datasets' => [
                [
                    'data' => [],
                    'backgroundColor' => [],
                ]
            ]
        ];

        $donutOptions = [
          'maintainAspectRatio' => false,
          'responsive' => true,
        ];

        //ESTRUTURA E PREENCHE OS DADOS PARA O GRAFICO DE DONUTS
        foreach ($result as $row) {
            $nomeServico = $row['nomeServico'];
            $totalPorServico = $row['totalPorServico'];

            $donutData['labels'][] = $nomeServico;
            $donutData['datasets'][0]['data'][] = $totalPorServico;
            $donutData['datasets'][0]['backgroundColor'][] = '#' . substr(md5(rand()), 0, 6); // Cor aleatória
        }

        //GRAFICO DE BARRAS - PRODUTO x PRECO
        $sql = "SELECT nomeProduto, valorProduto FROM produto";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);


        $nomesProdutos = [];
        $precosProdutos = [];

        foreach ($result as $row) {
            $nomesProdutos[] = $row['nomeProduto'];
            $precosProdutos[] = $row['valorProduto'];
        }

        //NOME_CLIENTE x SOMA_VALORES_COMPRADOS
        $sql = "SELECT SUM(a.valorTotal) AS valorTotalPorCliente, b.nomeCliente
                FROM compra a
                JOIN cliente b ON b.idCliente = a.fk_cliente_idCliente
                GROUP BY b.nomeCliente";

        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $valoresCompradosPorCliente = [];
        $nomesCliente = [];

        while ($row = $result->fetch_assoc()) {
            $valoresCompradosPorCliente[] = $row['valorTotalPorCliente'];
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
  <link rel="stylesheet" href="./styles/cliente.css">
  <script src="https://kit.fontawesome.com/b4415bb129.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini">
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
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding: 16px 8px; background-color: #d9dce5">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <!-- AREA CHART -->
            <div class="card card-color">
              <div class="card-header card-header-color">
                <h3 class="card-title">Valor total de compra por cliente</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus icon-color"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times icon-color"></i>
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
            <div class="card card-color">
              <div class="card-header card-header-color">
                <h3 class="card-title">Quantidade de Funcionários por cargo</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus icon-color"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times icon-color"></i>
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
            <div class="card card-color">
              <div class="card-header card-header-color">
                <h3 class="card-title">Serviços mais Pedidos do Pet Shop</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus icon-color"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times icon-color"></i>
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
            <div class="card card-color">
              <div class="card-header card-header-color">
                <h3 class="card-title">Produtos por preço</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus icon-color"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times icon-color"></i>
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
  <footer class="main-footer footer-color">
      <div class="box-footer">
          <b>Cuidar do que faz bem!</b>
      </div>
      <div class="box-footer">
          <strong>Copyright &copy; <a href="https://adminlte.io">Ducao PetShop</a>.</strong>
      </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
  $(function () {

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

    var valoresCompradosPorCliente = <?php echo json_encode($valoresCompradosPorCliente); ?>;
    var nomesCliente = <?php echo json_encode($nomesCliente); ?>;

    //-------------
    //- GRAFICO DE AREA -
    //-------------
    var areaData = {
        labels: nomesCliente,
        datasets: [
            {
                label: 'Valor da Compra',
                data: valoresCompradosPorCliente,
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
    //- DONUT GRAFICO -
    //-------------
    // Use a quantidade de funcionários para criar o gráfico usando Chart.js
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');

    var donutData1 = <?php echo json_encode($donutData1); ?>;
    var donutOptions1 = <?php echo json_encode($donutOptions1); ?>;

    new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData1,
        options: donutOptions1
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
    var nomesProdutos = <?php echo json_encode($nomesProdutos); ?>;
    var precosProdutos = <?php echo json_encode($precosProdutos); ?>;

    var barData = {
        labels: nomesProdutos,
        datasets: [
            {
                label: 'Preço',
                data: precosProdutos,
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