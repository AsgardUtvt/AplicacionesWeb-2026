
<?php	
class App{
    function __construct()
    {
        echo "<p> Nueva app</p>";
        $url = isset($_GET['url']) ? $_GET['url'] : 'No hay nada';
        echo $url;
    } 
}
?>
