
<?php	
class App{
    function __construct()
    {
        echo "<p> Nueva app</p>";
        $url = isset($_GET['url']) ? $_GET['url'] : 'No hay nada';
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $archivoController = '../' . $url[0] . '/';

        require_once($archivoController);
        $controller = new $url[0];
    } 
}
?>


