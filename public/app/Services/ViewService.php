<?php
namespace App\Services;

use Symfony\Component\Mailer\Transport\RoundRobinTransport;

class ViewService{
    public static $rutas = [
        // en el login
        'login' => 'Auth/LoginView',
        'generar_cuenta' => 'Auth/LoginGenerarCuentaView',
        'recuperar_cuenta' => 'Auth/LoginRecuperarCuentaView',

        //Donacion
        'generar_donacion' => 'Donacion/DonacionGenerarView'
    ];
    public static function string_path(string $nomvista): string {
        $strimpmodulearchivo = trim(self::$rutas[$nomvista]);
        if(str_contains($strimpmodulearchivo, '\\')){
            $parts = explode('\\', $strimpmodulearchivo);
        }else{
            $parts = explode('/', $strimpmodulearchivo);
        }
        $module = $parts[0];
        $view = $parts[1];
        $dir = __DIR__ . "/../Modules/$module/Views/$view.php";

        if(file_exists($dir)){
            return "/app/Modules/$module/Views/$view.php";
        }else{
            die('vista no valida' . $dir); 
        }

    }
    public static function require_view(string $moduleArchivo): void {
        $strimpModuleArchivo = trim($moduleArchivo);
        $parts = explode('\\', $strimpModuleArchivo);
        $module = $parts[0];
        $view = $parts[1];
        $dir = __DIR__ . "/../Modules/$module/Views/$view.php";

        if(file_exists($dir)){
            require($dir);
        }else{
            die('Vista no valida' . $dir); 
        }

    }
    public static function require_once_view(string $moduleArchivo): void {
        $strimpModuleArchivo = trim($moduleArchivo);
        if(str_contains($strimpModuleArchivo, '\\')){
            $parts = explode('\\', $strimpModuleArchivo);
        }else{
            $parts = explode($strimpModuleArchivo, '/');
        }
        $module = $parts[0];
        $view = $parts[1];
        $dir = __DIR__ . "/../Modules/$module/Views/$view.php";

        if(file_exists($dir)){
            require_once($dir);
        }else{
            die('Vista no valida'); 
        }
    }

    public static function header_view(string $moduleArchivo): void {
        $strimpModuleArchivo = trim($moduleArchivo);
        if(str_contains($strimpModuleArchivo, '\\')){
            $parts = explode('\\', $strimpModuleArchivo);
        }else{
            $parts = explode($strimpModuleArchivo, '/');
        }
        $module = $parts[0];
        $view = $parts[1];
        $dir = __DIR__ . "/../Modules/$module/Views/$view.php";
        if(file_exists($dir)){
            header($dir);
            exit();
        }else{
            die("Vista no valida");
        }
    }
    public static function require_once_view_test(): void {
        $dir = __DIR__ . "/../Test/Views/TestView.php";

        if(file_exists($dir)){
            require_once($dir);
        }else{
            die('Vista no valida'); 
        }
    }
}
