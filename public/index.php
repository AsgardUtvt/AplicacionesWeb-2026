<?php
use App\Core\Router;
use Dotenv\Dotenv;
require_once(__DIR__ . '/vendor/autoload.php');
// Cargar el Dotenv
$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();
// Pues lo de la url
$url = $_GET['url'] ?? '';
$url = trim($url, '/');
$router = new Router();
$router->resolve($url);

?>

