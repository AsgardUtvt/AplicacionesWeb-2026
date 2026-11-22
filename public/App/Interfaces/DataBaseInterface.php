<?php

namespace App\Interfaces;

use mysqli;

/**
 * Interface App\DataBase
 * @author yourname
 */
interface DataBaseInterface
{
    public function conectar(): mysqli;

    public function desconectar(): void;
}
