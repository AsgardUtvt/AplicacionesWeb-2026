<?php
namespace App\Services;

class SingletonUsuario {
    
    private static ?self $instance = null;
    private int $id;
    private string $email;
    private  string $nombre_completo;

    private function __construct()
    {
        
    }

  private function __clone()
    {
        
    }

    public function __wakeup()
    {
        die("No se puede deserializar un sigleton");
    }

    public static function getInstance(): self {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    public function setNombre(string $nombre): void {
        $this->nombre_completo = $nombre;
    }

    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getNombre(){
        return $this->nombre_completo;
    }
}


