<?php
    // Conexão com o banco de dados usando PDO

    function connection(){
        $servername = "localhost";
        $username = "root";
        $password = "jackson1500";
        $database = "pet_shop_bd";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $database);

        // Verifica se ocorreu algum erro na conexão
        if ($conn->connect_error) {
            die("Erro ao conectar com o MySQL: " . $conn->connect_error);
        }

        return $conn;
    }

?>