<?php
namespace App\DataBase;

use PDO;
use PDOException;

class MySqlDataBase implements IDataBase {
    
    private $conexion;

    private string $host = "localhost:8000" ;
    private string $db = "un_grano_de_mostaza";
    private string $user = "asgard";
    private string $pass = "admin";

    public function conectar(): PDO
    {
        try {
            $this->conexion = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8mb4, $this->user, $this->pass");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            die("Error de conexion". $e->getMessage());
        }
    }

    public function desconectar(): void
    {
           $this->conexion = null; 
    }

}

?> 
