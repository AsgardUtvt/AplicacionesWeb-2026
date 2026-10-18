<?php
use App\Core\Router;
require_once(__DIR__ . '/vendor/autoload.php');
$url = $_GET['url'] ?? '';
$url = trim($url, '/');
$router = new Router();
$router->resolve($url);
?>

