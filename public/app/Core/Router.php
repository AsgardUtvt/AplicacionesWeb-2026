<?php	

namespace App\Core;

class Router{

    public function resolve(string $url){

        $url = trim($url, '/');

        if(empty($url)){
            $url = 'auth/login/index';
        }

        $parts = explode('/', $url);
        $module = ucfirst($parts[0] ?? 'Auth');
        $controller =  ucfirst($parts[1]."Controller" ?? 'LoginController ' ); 
        $method =  $parts[2] ?? 'index';

        $controllerClass = "\\App\\Modules\\{$module}\\Controllers\\{$controller}";


        if (class_exists($controllerClass, $method)){
            $controllerObj = new $controllerClass();

            if(method_exists($controllerObj, $method)){
                $controllerObj->$method();
            }else{
                http_response_code(404);
                echo "Error 404: El metodo '{$method}' no existe en '{$controller}'";
                echo "<pre>";
                echo "URL recibida :$url\n";
                echo "Partes: $parts";
                echo "Módulo buscado: $module\n";
                echo "Controlador: $controller\n";
                echo "Metodo buscado: $method\n";
                echo "Clase completa: $controllerClass\n";
                echo "Existe la clase: " . (class_exists($controllerClass )? "si" : "no") ;
                echo "</pre>";
            }
        }else{
            http_response_code(404);
            echo "Error 404: El modulo '{$module}' no existe en '{$controller}'";
            echo "<pre>";
            echo "URL recibida :$url\n";
            echo "Partes: $parts";
            echo "Módulo buscado: $module\n";
            echo "Controlador: $controller\n";
            echo "Metodo buscado: $method\n";
            echo "Clase completa: $controllerClass\n";
            echo "Existe la clase: " . (class_exists($controllerClass )? "si" : "no") ;
            echo "</pre>";
        }

    }
}
?>
