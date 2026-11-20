<?php
require_once(__DIR__ . '/vendor/autoload.php');
use App\Services\ViewService;
use Dotenv\Dotenv;
// Cargar el Dotenv
const LOGIN = "Auth\LoginView";
$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();
const DIR = __DIR__ . "/app/Modules/";


ViewService::require_once_view_test();
?>
