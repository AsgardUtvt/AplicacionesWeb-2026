<?php 
namespace App\GlobalSingleton;

class GlobalSingleton {
    
    private static ?self $instance = null;

    private function __construct()
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start(); 
        }
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

    public function setSession(string $session, mixed $default){
        $_SESSION[$session] = $default;
    }

    public function getSession(string $session, mixed $default = null){
        return $_SESSION[$session] ?? $default;
    }
    public function has(string $session): bool{
        return isset($_SESSION[$session]);
    }

    public function destroy()
    {
        $_SESSION = [];
        if(session_status() == PHP_SESSION_ACTIVE){
            session_destroy();
        }
        self::$instance = null; 
    }
}
