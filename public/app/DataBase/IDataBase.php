<?php

namespace App\DataBase;

use PDO;

/**
 * Interface App\DataBase
 * @author yourname
 */
interface IDataBase
{
    /**
     * @param $dependencies
     */
    private  $conexion;

    private string $host;
    
    private string $db;
    
    private string $user;

    private string $pass;

    public function conectar(): PDO;

    public function desconectar(): void;
}
