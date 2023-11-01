<?php 
namespace connection;
use PDO;

class Connection {

    function getConnection(){
        $host = 'localhost';
        $port = '5432';
        $dbName = 'myplaylist';
        $user = 'postgres'; 
        $password = 'postgres';

        try {
            $pdo = new PDO ("pgsql:host=$host;port=$port;dbname=$dbName" , $user , $password);
            return $pdo;
    
        } catch (\PDOException $error) {
            echo "Erro na conexão: " . $error->getMessage();
        }
    }
}
?>

