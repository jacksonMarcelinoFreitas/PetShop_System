<?php
  require_once('./connection.php');

  try {
        // Estabeleça a conexão usando a extensão PDO
        $conn = connection();

        // Consulta para obter os cargos disponíveis no banco de dados
        $sqlCargos = "SELECT DISTINCT cargoFuncionario FROM funcionario";
        $stmtCargos = $conn->prepare($sqlCargos);
        $stmtCargos->execute();
        $cargos = $stmtCargos->fetchAll(PDO::FETCH_COLUMN);

        // Constrói os arrays para rótulos e dados do gráfico
        $labels = [];
        $data = [];
        $backgroundColor = [];

        foreach ($cargos as $cargo) {
            $sql = "SELECT COUNT(*) AS total_funcionarios FROM funcionario WHERE cargoFuncionario = :cargo";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(':cargo' => $cargo));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $labels[] = $cargo;
            $data[] = $row['total_funcionarios'];
            $backgroundColor[] = '#' . substr(md5(rand()), 0, 6); // Gera uma cor aleatória
        }

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

        $sql = "SELECT valorTotal, nomeCliente FROM compra JOIN cliente ON cpfCliente = fk_cliente_cpfCliente";
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