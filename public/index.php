<?php
require_once(__DIR__ . '/./vendor/autoload.php');
use App\Services\ViewService;
use Dotenv\Dotenv;
// Cargar el Dotenv
const LOGIN = "Auth\LoginView";
$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();
const DIR = __DIR__ . "/App/Modules/";
$uri = ViewService::getUri();
if($uri == '/')
{
    $uri = "/auth/login";
    ViewService::url($uri);
}
else
{
    ViewService::url($uri);
}
?>
