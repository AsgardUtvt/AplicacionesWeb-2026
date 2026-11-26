<?php
namespace App\Modules\Voluntario\Models; //direccion de la clase

use App\DataBase\MySqlDataBase; //use = import
use mysqli;

class RestauracionModel {
    private MySqlDataBase $dbInstance;
    private mysqli $con; //conexion activa con mysql 
    /*Atributos*/
    public string $nombre_proyecto;
    public string $tipo_ecosistema;
    public string $ubicacion;
    public int $arboles_meta;
    public string $fecha_inicio;
    /*Metodos*/
    public function __construct()
    {
        $this->dbInstance = MySqlDataBase::getMySqlDataBaseInstance();
        /*this"este objeto actual", getMySqlDataBaseInstance -metodoestatico-,
        :: llama las cosas de la clase, ent. guarda conex abierta en $this->con*/
        $this->con = $this->dbInstance->conectar();
    }
    public function registrarProyecto(): array
    {
        $sql = 
    }
}
