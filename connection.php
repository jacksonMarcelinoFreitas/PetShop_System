<?php
    // Conexão com o banco de dados usando PDO

    function connection(){
        $dsn = 'mysql:host=localhost;dbname=pet_shop_bd';
        $usuario = 'root';
        $senha = 'jackson1500';
    
        try {
            $pdo = new PDO($dsn, $usuario, $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
            return null;
        }
        
    }
   
?>