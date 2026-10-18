<?php	
namespace login_controller;

class LoginController{

    public function index(){
        require_once('../views/v-login.php');
    }

    public function recuperarCuenta(){
        require_once('../views/v-recuperar-cuenta.php');
    }

}


?>
