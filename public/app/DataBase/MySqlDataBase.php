<?php
namespace App\DataBase;

use mysqli;

class MySqlDataBase implements IDataBase {

    private string $host;
    private string $db ;
    private string $user;
    private string $pass;
    private int $port;
    private ?mysqli $con = null;

    // Generamos un sigleton
    private static ?self $instance = null;

    private function __construct(){

        $this->host = $_ENV['HOST'] ?? '' ;
        $this->db = $_ENV['DATABASE'] ?? '';
        $this->user = $_ENV['USER']?? '';
        $this->pass = $_ENV['PASS']?? '';
        $this->port = (int)($_ENV['PORT']?? '');
    }

    private function __clone(){
    }

    public function __wakeup(){
    }


    public static function getMySqlDataBaseInstance(): self{
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function conectar(): mysqli
    {
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->db, $this->port);
        if($this->con->connect_error){
            die("Error 505");
        }
        return $this->con;
    }

    public function desconectar(): void
    {
        if($this->con != null){$this->con->close(); $this->con = null;}
    }

    public function __destruct()
    {
        $this->desconectar();
    }

}

?> 
