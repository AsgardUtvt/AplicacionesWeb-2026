<?php
namespace App\Services;


class ViewService{
    public static $rutas = [
        // en el login
        'login' => 'Auth/LoginView',
        'generar_cuenta' => 'Auth/LoginGenerarCuentaView',
        'recuperar_cuenta' => 'Auth/LoginRecuperarCuentaView',
        'datos_recuperar_cuenta' => 'Auth/LoginDatosRecuperarCuenta',
        'cambiar_contrasena' => 'Auth/LoginCambioContrasenaView',

        //Donacion
        'generar_donacion' => 'Donacion/DonacionGenerarView',
        //Menu
        'menu' => 'Menu/MenuView'
    ];

    public static function url(string $uri){
        switch ($uri) {
            //Login
        case '/auth/login':
            self::require_view('login');
            break;
        case '/auth/generar-cuenta':
            self::require_view('generar_cuenta');
            break;
        case '/auth/recuperar-cuenta':
            self::require_view('recuperar_cuenta');
            break;
        case '/auth/cambiar-contrasena':
            self::require_view('cambiar_contrasena');
            break;
            //Donaciones
        case '/donacion/generar-donacion':
            self::require_view('generar_donacion');
            break;
        case '/auth/login':
            self::require_view('login');
            break;
            //Menu
        case '/menu/menu-view':
            self::require_view('menu');
            break;
        case '/auth/login':
            self::require_view('login');
            break;
        case '/auth/generar-cuenta':
            self::require_view('generar_cuenta');
            break;
        case '/auth/login':
            self::require_view('login');
            break;
        case '/auth/generar-cuenta':
            self::require_view('generar_cuenta');
            break;
        default:
            http_response_code(404);
            echo "404 - Ruta no econtrada";
            break;
        }
    }
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
            return "/App/Modules/$module/Views/$view.php";
        }else{
            die('vista no valida' . $dir); 
        }

    }
    public static function require_view(string $moduleName): void {
        $strimpModuleArchivo = trim(self::$rutas[$moduleName]);
        if(str_contains($strimpModuleArchivo, '\\')){
            $parts = explode('\\', $strimpModuleArchivo);
        }else{
            $parts = explode('/',$strimpModuleArchivo);
        }

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
            $parts = explode('/',$strimpModuleArchivo);
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
            $parts = explode('/',$strimpModuleArchivo);
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

    public static function getUri(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
/*
    public static function redireccionarScript(string $message, string $redirecion){
        header('Location: ' . $redirecion);
        echo "<script> alert('$message'); location.assign('$redirecion'); </script>";
        exit();
    }
    public static function soloAlerta(string $message){
        header('Location: ' . self::getUri());
        echo "<script> alert('$message');</script>";
        exit();
    }
}*/
    public static function redireccionarScript(string $message, string $redireccion): void {
        $msg = json_encode($message, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        $url = json_encode($redireccion);
        echo "<script> alert($msg); window.location.href = $url; </script>";
        exit();
    }

    public static function soloAlerta(string $message): void {
        $msg = json_encode($message, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
        echo "<script> alert($msg); window.location.reload(); </script>";
        exit();
    }
} 
