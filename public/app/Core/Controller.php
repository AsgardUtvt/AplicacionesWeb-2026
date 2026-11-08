<?php
namespace App\Core;

class Controller {
    /*
     * Resive dos parametros el nombre del archivo y un arreglo de los parametros
I    */
    protected function view(string $viewName, array $data = [], int $num = 1 ){
        /*
         *  
         *  En caso de poner otro numero diferente a 1 los llevara a otra vista 
         *  Poner el siguienten formato en $viewName 
         *  <NombreModulo>\<NombreVista>
            TODO: Intentar mejorar la lógipara ir a otras vistas en base a el controller
        */
        // Se obtien el nombre de la clase actual
        if( $num == 1 ){
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
        }else
        {

            $parts = explode('\\', $viewName);


            $moduleName = $parts[0];
            $viewModuleName = $parts[1];

            $viewPath = __DIR__ . "/../Modules/{$moduleName}/Views/{$viewModuleName}.php";

            extract($data);

            if(file_exists($viewPath)){
                require $viewPath; 
            }else {
                die("Error: La vista '{$viewName}.php' no existe en el módulo'{$moduleName}'.");
            }
        }
    }

}
?>
