<?php
namespace App\Core;

class Controller {
    /*
     * Resive dos parametros el nombre del archivo y un arreglo de los parametros
     */
    protected function view(string $viewName, array $data = []){
        // Se obtien el nombre de la clase actual
        $fullClassName = get_class($this);

        $parts = explode('\\', $fullClassName);

        $moduleName = $parts[2];

        $viewPath = __DIR__ . "/../Modules/{$moduleName}/Views/{$viewName}.php";

        extract($data);

        if(file_exists($viewPath)){
            require $viewPath; 
        }else {
            die("Error: La vista '{$viewName}.php' no existe en el módulo'{$moduleName}'.");
        }
    }

}
?>
