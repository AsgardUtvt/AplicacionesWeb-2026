<?php

namespace App\DataBase;

use mysqli;

/**
 * Interface App\DataBase
 * @author yourname
 */
interface IDataBase
{
    public function conectar(): mysqli;

    public function desconectar(): void;
}
