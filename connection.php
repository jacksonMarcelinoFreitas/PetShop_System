<?php
    // Conexão com o banco de dados usando PDO

    try{

        function connection(){
            $servername = "localhost";
            $username = "root";
            $password = "jackson1500";
            $database = "pet_shop_bd";

            // Cria a conexão
            $conn = new mysqli($servername, $username, $password, $database);

            // Verifica se ocorreu algum erro na conexão
            if ($conn == $conn->connect_error) {
                echo "Problemas de conexão com o banco!";
            }

            return $conn;
        }

    }catch(Exception $e){
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

    // connection();

?>